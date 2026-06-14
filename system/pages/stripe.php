<?php

/**
 * Stripe Payment Integration - Versão com Tratamento de Erros Aprimorado
 */
defined('MYAAC') or die('Direct access not allowed!');
header('Content-Type: application/json');

// Função para padronizar respostas de erro
function jsonError($message, $details = [])
{
    $response = ['success' => false, 'error' => $message];
    if (!empty($details)) {
        $response['details'] = $details;
    }
    echo json_encode($response);
    exit;
}

// Verifica login
if (!isset($account_logged)) {
    jsonError('Você precisa estar logado');
}

require_once 'vendor/autoload.php';

// Produtos disponíveis
$products = $config['products'];

// Processa input
$input = json_decode(file_get_contents('php://input'), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    jsonError('JSON inválido', ['json_error' => json_last_error_msg()]);
}

$required = ['product_id', 'currency', 'order_id'];
foreach ($required as $field) {
    if (empty($input[$field])) {
        jsonError("Campo {$field} é obrigatório", ['missing_field' => $field]);
    }
}

// Validações
if (!isset($products[$input['product_id']])) {
    jsonError('Produto inválido', ['product_id' => $input['product_id']]);
}

// Função para buscar cotações com tratamento robusto de erros
function getExchangeRates()
{
    $rates = ['USD' => 5.0, 'EUR' => 5.5]; // Fallback

    try {
        for ($i = 0; $i < 3; $i++) {
            $date = date('m-d-Y', strtotime("-$i days"));

            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYPEER => true
            ]);

            // Busca cotação USD
            $usdUrl = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao='{$date}'&\$format=json";
            curl_setopt($ch, CURLOPT_URL, $usdUrl);
            $usdResponse = curl_exec($ch);

            if ($usdResponse === false) {
                error_log("Erro cURL USD: " . curl_error($ch));
                continue;
            }

            $usdData = json_decode($usdResponse, true);
            if (json_last_error() !== JSON_ERROR_NONE || empty($usdData['value'][0]['cotacaoCompra'])) {
                error_log("Dados USD inválidos para {$date}: " . print_r($usdData, true));
                continue;
            }

            $rates['USD'] = (float)$usdData['value'][0]['cotacaoCompra'];

            // Busca cotação EUR
            $eurUrl = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='EUR'&@dataCotacao='{$date}'&\$format=json";
            curl_setopt($ch, CURLOPT_URL, $eurUrl);
            $eurResponse = curl_exec($ch);

            if ($eurResponse !== false) {
                $eurData = json_decode($eurResponse, true);
                if (json_last_error() === JSON_ERROR_NONE && !empty($eurData['value'][0]['cotacaoCompra'])) {
                    $rates['EUR'] = (float)$eurData['value'][0]['cotacaoCompra'];
                }
            }

            curl_close($ch);
            break;
        }
    } catch (Exception $e) {
        error_log("Exception in getExchangeRates: " . $e->getMessage());
    }

    return $rates;
}

$rates = getExchangeRates();
$product = $products[$input['product_id']];
$currency = strtoupper($input['currency']);

if (!in_array($currency, ['BRL', 'USD', 'EUR'])) {
    jsonError('Moeda não suportada', ['currency' => $currency]);
}

// Calcula valores
$valor_brl = $product['price'];
$valor_final = ($currency === 'BRL') ? $valor_brl : $valor_brl / $rates[$currency];

// Config Stripe
try {
    \Stripe\Stripe::setApiKey("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");



    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card', 'boleto'],
        'line_items' => [[
            'price_data' => [
                'currency' => strtolower($currency),
                'product_data' => ['name' => $product['coins'] . ' Coins'],
                'unit_amount' => (int)round($valor_final * 100),
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => '',
        'cancel_url' => '',
        'customer_email' => $account_logged->getEmail(),
        'metadata' => [
            'product_id' => $input['product_id'],
            'account_id' => (int)$account_logged->getId()
        ]
    ]);

    // Insere histórico
    $db->insert('historico_pagamentos', [
        'payment_id' => $session->id,
        'account_id' => (int)$account_logged->getId(),
        'valor' => $valor_brl,
        'tipo' => 'Stripe',
        'currency' => $currency,
        'qrcode' => $session->url
    ]);

    // Resposta de sucesso
    echo json_encode([
        'success' => true,
        'payment_url' => $session->url,
        'payment_id' => $session->id,
        'valor_brl' => $valor_brl,
        'moeda' => $currency,
        'valor_convertido' => $valor_final,
        'taxa_cambio' => $currency === 'BRL' ? 1 : $rates[$currency]
    ]);
    exit;
} catch (\Stripe\Exception\ApiErrorException $e) {
    jsonError('Erro no processamento do pagamento', [
        'stripe_error' => $e->getMessage(),
        'error_type' => get_class($e)
    ]);
} catch (Exception $e) {
    jsonError('Erro no servidor', [
        'exception' => $e->getMessage(),
        'error_type' => get_class($e),
        'trace' => $e->getTraceAsString()
    ]);
}
