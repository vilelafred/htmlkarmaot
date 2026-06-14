<?php

// Inclua a configuração e outras classes necessárias aqui
include(__DIR__ . '/../classes/pagamentomp.php');
include(__DIR__ . '/../classes/pagamento.php');

// Defina os valores padrão para o array
$array = array(
    'cli_nome' => '',
    'cli_email' => '',
    'cli_ddd' => '',
    'cli_celular' => '',
    'cli_cpf' => '',
    'cli_endereco' => '',
    'cli_numero' => '',
    'cli_cep' => '',
);

// Obtém o nome da conta logada (substitua por sua lógica de obtenção)
$account_name = $account_logged->getName();

$pagmp = new PagamentoMP();

// Obtém os valores do formulário (certifique-se de validar e filtrar os dados recebidos)
$valor = (int)$_POST['itemCount'];
$ref_cod_pedido = (int)$_POST['ref_cod_pedido'];

// Verifica se o pedido já existe
$pagmp->VerificaID($ref_cod_pedido);
$pedidoexist = false;
foreach ($pagmp->GetItens() as $lista) {
    if ($lista['ped_ref'] == $ref_cod_pedido) {
        $pedidoexist = true;
        break;
    }
}

if (!$pedidoexist) {
    // Gera um valor único para o pedido
    $sub = (int)date('ymdHism');
    $ref_cod_pedido = $ref_cod_pedido + $sub;
}

// Insere os dados no banco de dados (certifique-se de tratar exceções e erros)
$pagamento = new Pagamento;
$pagamento->insertMercadoPago($account_name, $valor, $ref_cod_pedido);

// Gera o link de pagamento com Mercado Pago
$pagmp->PagarMP($ref_cod_pedido, $valor, $array, $account_name);

// Saída HTML
$main_content .= '<center>' . $pagmp->btn_mp . '</center><br>';

?>

<script>
    $(document).ready(function() {
        $('[name="MP-Checkout"]')[0].click();
    });
</script>
