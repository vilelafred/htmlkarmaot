<?php

require_once(__DIR__ . '/system/classes/pagamentomp.php');

// Verifica se foi recebido o ID da coleção ou ID da transação
if (isset($_GET['collection_id']) || isset($_GET['id'])) {
    echo '<div class="panel-body"><h3><center>Seu pedido foi registrado, você receberá informações sobre o status do pagamento por e-mail.</center></h3>';
    echo '<h5><center>Caso não haja informações sobre o pagamento nesta tela, fique tranquilo, você receberá um e-mail do MercadoPago com seu status.</center></h5></div>';

    // Define o código da transação
    $cod = isset($_GET['collection_id']) ? $_GET['collection_id'] : $_GET['id'];

    // Obtém os detalhes da transação
    $pag = new PagamentoMP();
    $pag->Retorno($cod);
} else {
    echo '<div class="panel-body"><h3><center>Atenção! Nenhuma transação encontrada.</center></h3></div>';
}
?>
