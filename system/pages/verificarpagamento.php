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
// Recebe os dados do POST
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);



// 7. Atualização do banco de dados
try {
    // Inicia transação
    $db->beginTransaction();

    // Busca os dados atuais do pagamento
    $query = $db->prepare("
        SELECT payment_id
        FROM historico_pagamentos 
        WHERE payment_id = :txid AND status = 4 AND entregue = 1
    ");
    $query->execute([':txid' => $inputData['paymentId']]);
    $pagamentoAtual = $query->fetch();
	
	$db->commit();

    if (!$pagamentoAtual) {
		echo json_encode(false);
    }else{
		echo json_encode(true);
	}
	exit;

    // Confirma a transação
 

    // Resposta de sucesso
    
} catch (Exception $e) {

    http_response_code(500);
    echo json_encode(false);
	exit;
}
