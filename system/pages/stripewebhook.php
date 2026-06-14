<?php

/**
 * Webhook para processamento de pagamentos Stripe
 *
 * @package   MyAAC
 * @author    Seu Nome <seu@email.com>
 * @copyright 2023
 * @link      https://seusite.com
 */
defined('MYAAC') or die('Direct access not allowed!');

header('Content-Type: application/json');

// 1. Verificação inicial da requisição
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// 2. Autenticação do webhook
$STRIPE_WEBHOOK_SECRET = "whsec_tl4MjxN15G2jvJep0osz6lj4IBONCY9o";
$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

try {
    require_once 'vendor/autoload.php';
    \Stripe\Stripe::setApiKey('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');

    $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sig_header,
        $STRIPE_WEBHOOK_SECRET
    );
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    http_response_code(401);
    echo json_encode(['error' => 'Assinatura inválida']);
    exit;
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => 'Erro ao processar webhook']);
    exit;
}

// 3. Processamento do evento
try {
    // Só processamos eventos checkout.session.completed
    if ($event->type !== 'checkout.session.completed') {
        echo json_encode(['success' => true, 'message' => 'Evento não relevante ignorado']);
        exit;
    }

    $session = $event->data->object;
    $sessionId = $session->id;
    $status = strtoupper($session->payment_status);
    //$valor = $session->amount_total / 100; // Converte de centavos para valor normal
    //$referencia = $session->metadata->order_id ?? $sessionId;
    //$account_id = $session->metadata->account_id ?? null;
    //$currency = strtoupper($session->currency);

    // 4. Mapeamento de status (equivalente ao PoloPag)
    $statusMapping = [
        'PAID' => 4,       // Pagamento aprovado/concluído
        'UNPAID' => 1,      // Aguardando pagamento
        'CANCELED' => 7,    // Pagamento cancelado
        'EXPIRED' => 8      // Pagamento expirado
    ];

    $status_id = $statusMapping[$status] ?? 0; // 0 = status desconhecido

    // 5. Atualização do banco de dados (mesma lógica do PoloPag)
    $db->beginTransaction();

    // Busca os dados atuais do pagamento
    $query = $db->prepare("
        SELECT payment_id, valor, status, entregue, account_id 
        FROM historico_pagamentos 
        WHERE payment_id = :sessionId
    ");
    $query->execute([':sessionId' => $sessionId]);
    $pagamentoAtual = $query->fetch();

    if (!$pagamentoAtual) {
        throw new Exception("Pagamento não encontrado");
    }

    // Se o pagamento foi aprovado e ainda não foi entregue
    if ($status === 'PAID' && $pagamentoAtual['status'] == 1 && $pagamentoAtual['entregue'] == 0) {
		// Atualiza o status do pagamento
		$updateQuery = $db->prepare("
			UPDATE `historico_pagamentos` 
			SET `status` = :status,
				`entregue` = :entregue
			WHERE `payment_id` = :sessionId
		");

		$updateQuery->execute([
			':status' => $status_id,
			':entregue' => 1,
			':sessionId' => $sessionId
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
			// Credita os coins na conta (soma ao premium_points existente)
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
			// Caso não exista pacote para esse valor
			error_log("Pagamento {$sessionId} com valor {$valorPago} não corresponde a nenhum pacote de premium_points.");
		}
	}


    $db->commit();

    // Resposta de sucesso
    echo json_encode([
        'success' => true,
        'message' => 'Webhook processado com sucesso',
        'payment_id' => $sessionId,
        'status' => $status
    ]);
    exit;
} catch (Exception $e) {
    if ($db->inTransaction()) {
        $db->rollBack();
    }

    http_response_code(500);
    echo json_encode([
        'error' => 'Erro ao processar webhook',
        'message' => $e->getMessage()
    ]);
    exit;
}
