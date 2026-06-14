<?php

/**
 * Webhook para processamento de pagamentos PoloPag
 *
 * @package   MyAAC
 * @author    Seu Nome <seu@email.com>
 * @copyright 2023
 * @link      https://seusite.com
 */

header('Content-Type: application/json');

//   $logData = [
//     'timestamp' => date('Y-m-d H:i:s'),
//     'server' => [
//         'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'] ?? 'N/A',
//         'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'] ?? 'N/A',
//         'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
//         'HTTP_REFERER' => $_SERVER['HTTP_REFERER'] ?? 'N/A',
//         'HTTP_X_POLOPAG_TOKEN' => $_SERVER['HTTP_X_POLOPAG_TOKEN'] ?? 'N/A',
//         'SERVER_PROTOCOL' => $_SERVER['SERVER_PROTOCOL'] ?? 'N/A',
//         'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? 'N/A',
//         'QUERY_STRING' => $_SERVER['QUERY_STRING'] ?? 'N/A',
//         'ALL_HEADERS' => getallheaders()
//     ],
//     'get' => $_GET,
//     'post' => $_POST,
//     'input' => file_get_contents('php://input'),
//     'raw_input' => $inputJSON = file_get_contents('php://input'),
//     'decoded_input' => json_decode(file_get_contents('php://input'), true)
// ];

// $db->insert('historico_pagamento_log', [
//     'log' => json_encode($logData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
// ]);

// 1. Verificação inicial da requisição
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// 2. Autenticação do webhook
$POLOPAG_WEBHOOK_TOKEN = "d8940b5f22b9881ca953afc0b868e22ac94381ff9670c540a75de031341de9dd";

// 3. Processamento do payload
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'JSON inválido']);
    exit;
}

// 5. Mapeamento de status
$statusMapping = [
    'APROVADO' => 4,       // Pagamento aprovado/concluído
    'PENDENTE' => 1,       // Aguardando pagamento
    'REJEITADO' => 7,      // Pagamento rejeitado
    'EXPIRADO' => 8,       // Pagamento expirado
    'DEVOLVIDO' => 6       // Pagamento devolvido
];

$txid = $inputData['txid'];
$status = strtoupper($inputData['status']);

// 6. Determina o status interno
$status_id = $statusMapping[$status] ?? 0; // 0 = status desconhecido

// 7. Atualização do banco de dados
try {
    // Inicia transação
    $db->beginTransaction();

    // Busca os dados atuais do pagamento
    $query = $db->prepare("
        SELECT payment_id, valor, status, entregue, account_id 
        FROM historico_pagamentos 
        WHERE payment_id = :txid
    ");
    $query->execute([':txid' => $txid]);
    $pagamentoAtual = $query->fetch();

    if (!$pagamentoAtual) {
        throw new Exception("Pagamento não encontrado");
    }

    // Se o pagamento foi aprovado e ainda não foi entregue
    if ($status === 'APROVADO' && $pagamentoAtual['status'] == 1 && $pagamentoAtual['entregue'] == 0) {
		// Atualiza o status do pagamento
		$updateQuery = $db->prepare("
			UPDATE `historico_pagamentos` 
			SET `status` = :status,
				`entregue` = :entregue
			WHERE `payment_id` = :txid
		");

		$updateQuery->execute([
			':status' => 4,
			':entregue' => 1,
			':txid' => $pagamentoAtual['payment_id']
		]);
		
		$valorPago = (float) $pagamentoAtual['valor'];
		$coins = 0;

		// Procura o pacote correspondente ao valor pago
		foreach ($config['products'] as $product) {
			if ($product['price'] == $valorPago) {
				$coins = $product['coins'];
				break;
			}
		}

		if ($coins > 0) {
			// Credita os coins na conta
			$updateAccount = $db->prepare("
				UPDATE `accounts` 
				SET `premium_points` = `premium_points` + :coins 
				WHERE `id` = :accountId
			");
			$updateAccount->execute([
				':coins' => $coins,
				':accountId' => $pagamentoAtual['account_id']
			]);
		} else {
			// Caso o valor não corresponda a nenhum pacote cadastrado
			error_log("Pagamento {$pagamentoAtual['payment_id']} com valor {$valorPago} não corresponde a nenhum pacote de coins.");
		}
	}


    // Confirma a transação
    $db->commit();

    // Resposta de sucesso
    echo json_encode([
        'success' => true,
        'message' => 'Webhook processado com sucesso'
    ]);
} catch (Exception $e) {
	
    // Rollback em caso de erro
    if ($db->inTransaction()) {
        $db->rollBack();
    }

    http_response_code(500);
    echo json_encode([
        'error' => 'Erro ao processar webhook',
        'message' => $e->getMessage()
    ]);
}
