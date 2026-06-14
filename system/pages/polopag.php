<?php

/**
 * Register Account New
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @copyright 2019 MyAAC
 * @link      https://my-aac.org
 */
defined('MYAAC') or die('Direct access not allowed!');

header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($account_logged)) {
    echo json_encode(['error' => 'Você precisa estar logado']);
    exit;
}

// Recebe os dados do POST
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

// Valida os dados recebidos
if (empty($inputData['cpf'])) {
    echo json_encode(['error' => 'CPF não informado']);
    exit;
}

if (empty($inputData['price_brl'])) {
    echo json_encode(['error' => 'Valor não informado']);
    exit;
}

// Configurações da PoloPag
$POLOPAG_TOKEN = "d8940b5f22b9881ca953afc0b868e22ac94381ff9670c540a75de031341de9dd"; // Seu token da PoloPag
$POLOPAG_URL   = "https://api.polopag.com/v1/cobpix";

// Formata os dados
$valor = number_format(
    floatval(str_replace(['R$', '.', ','], ['', '', '.'], $inputData['price_brl'])),
    2,
    '.',
    ''
);

$cpf = preg_replace('/\D/', '', $inputData['cpf']); // Remove tudo que não for número

// Valida o CPF (adicione sua função de validação de CPF aqui)
if (strlen($cpf) != 11) {
    echo json_encode(['error' => 'CPF inválido']);
    exit;
}

// Cria payload para PoloPag
$referencia = 'PAG' . time() . rand(100, 999); // Gera uma referência única
$payload = [
    "valor" => (string)$valor,
    "calendario" => [
        "expiracao" => 3600 // 1 hora de expiração
    ],
    "isDeposit" => false,
    "referencia" => $referencia,
    "solicitacaoPagador" => "Compra de Pontos no site - Pedido {$referencia}",
    "devedor" => [
        "cpf" => $cpf,
        "nome" => $account_logged->getName() // Nome da conta logada
    ],
    "infoAdicionais" => [
        [
            "nome"  => "Pedido",
            "valor" => $referencia
        ],
        [
            "nome"  => "Valor",
            "valor" => "R$ {$valor}"
        ],
        [
            "nome"  => "Conta",
            "valor" => $account_logged->getName()
        ]
    ],
    "webhookUrl" => "/?polopagwebhook" // URL do seu webhook
];

// Envia requisição para PoloPag
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $POLOPAG_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Api-Key: {$POLOPAG_TOKEN}"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Verifica erros na requisição
if ($curlError) {
    echo json_encode(['error' => "Erro na comunicação com PoloPag: {$curlError}"]);
    exit;
}

$resData = json_decode($response, true);

if ($httpCode === 200 && isset($resData['txid'])) {
    // Salva no histórico
    $db->insert('historico_pagamentos', [
        'payment_id' => $resData['txid'] ?? $referencia,
        'account_id' => (int)$account_logged->getId(),
        'tipo'       => 'PoloPagPIX',
        'valor'      => $valor,
        'qrcode'     => $resData['qrcodeBase64']
    ]);


    echo json_encode([
        'pix_code' => $resData['pixCopiaECola'],
        'pix_qr_code'        => $resData['qrcodeBase64'],
        'payment_id'     => $resData['txid'] ?? $referencia,
        'valor'          => $valor,
        'produto'        => 'Pontos'
    ]);
    exit;
} else {
    echo json_encode(['error' => $resData]);
    exit;
}
