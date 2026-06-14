<?php

require_once 'common.php';
require_once 'config.php';
require_once 'config.local.php';
require_once SYSTEM . 'functions.php';
require_once SYSTEM . 'init.php';
require_once SYSTEM . 'status.php';

header('Content-Type: application/json');

$limiteFile = __DIR__ . "/limite.json";

// Carrega ou cria JSON
if (!file_exists($limiteFile)) {
    file_put_contents($limiteFile, json_encode([]));
}
$limites = json_decode(file_get_contents($limiteFile), true);

$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

if (isset($inputData['nameAccount'])) {
    $nameAccount = trim($inputData['nameAccount']);
    $agora = time();

    // 🔹 Verifica limite pelo nameAccount primeiro
    $keyName = "nameAccount:" . strtolower($nameAccount);
    if (isset($limites[$keyName]) && $agora < $limites[$keyName] + 300) {
        $faltam = ($limites[$keyName] + 300) - $agora;
        echo json_encode([
            'error' => "You can only generate again in {$faltam} seconds"
        ]);
        exit;
    }

    // Atualiza JSON pelo nameAccount
    $limites[$keyName] = $agora;
    file_put_contents($limiteFile, json_encode($limites));

    // 🔹 Agora busca o ID da conta
    $query = $db->prepare("SELECT id FROM accounts WHERE name = :nameAccount");
    $query->execute([':nameAccount' => $nameAccount]);
    $dadosAccount = $query->fetch();

    if (!$dadosAccount) {
        echo json_encode(['error' => 'Conta não encontrada']);
        exit;
    }

    $accountId = (int)$dadosAccount['id'];
    $keyId = "id:" . $accountId;

    // 🔹 Verifica limite também pelo id
    if (isset($limites[$keyId]) && $agora < $limites[$keyId] + 300) {
        $faltam = ($limites[$keyId] + 300) - $agora;
        echo json_encode([
            'error' => "Você só pode gerar novamente em {$faltam} segundos"
        ]);
        exit;
    }

    // Atualiza JSON também pelo id
    $limites[$keyId] = $agora;
    file_put_contents($limiteFile, json_encode($limites));

    // --- Fluxo normal da PoloPag ---
    $valor = number_format(
        floatval(str_replace(['R$', '.', ','], ['', '', '.'], $inputData['valor'])),
        2,
        '.',
        ''
    );
    $name = $inputData['name'];
    $lastname = $inputData['lastname'];

    $POLOPAG_TOKEN = "d8940b5f22b9881ca953afc0b868e22ac94381ff9670c540a75de031341de9dd";
    $POLOPAG_URL   = "https://api.polopag.com/v1/cobpix";

    $referencia = 'PAG' . time() . rand(100, 999);

    $payload = [
        "valor" => (string)$valor,
        "calendario" => ["expiracao" => 3600],
        "isDeposit" => false,
        "referencia" => $referencia,
        "solicitacaoPagador" => "Compra de Pontos no site - Pedido {$referencia}",
        "devedor" => ["nome" => $nameAccount],
        "infoAdicionais" => [
            ["nome" => "Pedido", "valor" => $referencia],
            ["nome" => "Valor", "valor" => "R$ {$valor}"],
            ["nome" => "Conta", "valor" => $nameAccount]
        ],
        "webhookUrl" => "/?polopagwebhook"
    ];

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

    if ($curlError) {
        echo json_encode(['error' => "Erro na comunicação com PoloPag: {$curlError}"]);
        exit;
    }

    $resData = json_decode($response, true);

    if ($httpCode === 200 && isset($resData['txid'])) {
        $db->insert('historico_pagamentos', [
            'payment_id' => $resData['txid'] ?? $referencia,
            'account_id' => $accountId,
            'tipo'       => 'PoloPagPIX',
            'valor'      => $valor,
            'qrcode'     => $resData['qrcodeBase64']
        ]);

        echo json_encode([
            'pix_code' => $resData['pixCopiaECola'],
            'qr_code'  => $resData['qrcodeBase64'],
            'qr_code_base64' => $resData['qrcodeBase64'],
            'payment_id' => $resData['txid'] ?? $referencia,
            'valor'      => $valor,
            'produto'    => 'Pontos'
        ]);
        exit;
    } else {
        echo json_encode(['error' => $resData]);
        exit;
    }

} elseif (isset($inputData['payment_id'])) {
    $db->beginTransaction();

    $query = $db->prepare("
        SELECT payment_id
        FROM historico_pagamentos 
        WHERE payment_id = :txid AND status = 4 AND entregue = 1
    ");
    $query->execute([':txid' => $inputData['payment_id']]);
    $pagamentoAtual = $query->fetch();
    $db->commit();

    echo json_encode((bool)$pagamentoAtual);
} else {
    echo json_encode(['error' => 'Campos inválidos']);
}
