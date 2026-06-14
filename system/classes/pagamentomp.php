<?php

require_once(__DIR__ . '/../../lib/mercadopago/sdk/lib/mercadopago.php');
require_once(__DIR__ . '/conexao.php');

/**
 * Description of PagamentoMP
 *n
 * @Maycon
 */
class PagamentoMP extends Conexao
{
    private $doublepoints;
    /**
     * @var type string: link para o pagamento
     */
    public $btn_mp;
    /**
     *
     * @var bool se vai usar lightbox ou não
     */
    private $lightbox = true;

    /***array com davdos da transação ****/
    public $info = array();
    /**
     *
     * @var bool se é sandbox ou não  
     */
    private $sandbox = false; //sandbox ou nao 

    /**
     * método de requisição de pagamento 
     */
    public function PagarMP($ref, $valor, $cliente = [], $account_name){
        // Iniciando as credenciais no MP
        $mp = new MP(Config::MP_CLIENT_ID, Config::MP_CLIENT_SECRET);

        $preference_data = array(
            "items" => array(
                array(
                    "id" => $ref,
                    "title" => $account_name,
                    "currency_id" => "BRL",
                    "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
                    "description" => $account_name,
                    "quantity" => 1,
                    "unit_price" => $valor,
                )
            ),
            "payer" => array(
                "name" => $cliente['cli_nome'],
                "surname" => $cliente['cli_sobrenome'],
                "email" => $cliente['cli_email'],
                "phone" => array(
                    "area_code" => $cliente['cli_ddd'],
                    "number" => $cliente['cli_celular']
                ),
                "identification" => array(
                    "type" => "CPF",
                    "number" => $cliente['cli_cpf']
                ),
                "address" => array(
                    "street_name" => $cliente['cli_endereco'],
                    "street_number" => $cliente['cli_numero'],
                    "zip_code" => $cliente['cli_cep']
                )
            ),
            "back_urls" => array(
                "success" => Config::SITE_NAME . 'pedido_retorno_mp.php',
                "failure" => Config::SITE_NAME . 'pedido_retorno_mp.php',
                "pending" => Config::SITE_NAME . 'pedido_retorno_mp.php',
                "approved" => Config::SITE_NAME . 'pedido_retorno_mp.php',
            ),
            "notification_url" => Config::SITE_NAME . 'pedido_retorno_mp.php',
            "external_reference" => $ref,
        );

        try {
            $preference = $mp->create_preference($preference_data);
        } catch (\Exception $e) {
            echo "Houve alguma falha durante a comunicação, por favor contate o Administrador.";
        }

        // Cria link para o botão de pagamento
        $this->btn_mp = $this->sandbox
            ? '<a href="' . $preference["response"]["sandbox_init_point"] . '" name="MP-Checkout" class="btn btn-success btn-lg">Pagar com Mercado Pago</a>'
            : '<a href="' . $preference["response"]["init_point"] . '" name="MP-Checkout" class="btn btn-success btn-lg">Pagar com Mercado Pago</a>';

        // Adiciona script de lightBox, se necessário
        if ($this->lightbox) {
            $this->btn_mp .= '<script type="text/javascript" src="https://secure.mlstatic.com/mptools/render.js"></script>';
        }
    }

    /**
     * 
     * @param string $ref  com código referencia do pedido
     */
    public function Retorno($id){
        $mp = new MP(Config::MP_CLIENT_ID, Config::MP_CLIENT_SECRET);
        $params = ["access_token" => $mp->get_access_token()];

        $topic = 'payment';

        if ($topic == 'payment') {
            $payment_info = $mp->get("/collections/notifications/" . $id, $params, false);
            $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"], $params, false);
        }

        if ($merchant_order_info["status"] == 200) {
            $transaction_amount_order = $merchant_order_info["response"]["total_amount"];
            $payments = $merchant_order_info["response"]["payments"];
            $transaction_amount_payments = array_reduce($payments, function ($sum, $payment) {
                return $sum + ($payment['status'] == 'approved' ? $payment['transaction_amount'] : 0);
            }, 0);

            if ($transaction_amount_payments >= $transaction_amount_order) {
                // Release your items
            }
        }

        $statusMappings = array(
            "approved" => "Pagamento Efetuado",
            "pending" => "Aguardando Pagamento",
            "in_process" => "Aguardando Pagamento",
            "rejected" => "Rejeitado",
            "refunded" => "Devolvido",
            "cancelled" => "Cancelado",
            "in_mediation" => "Disputa"
        );
        $status = $statusMappings[$payment_info["response"]["collection"]["status"]] ?? "Desconhecido";

        $paymentTypeMappings = array(
            "ticket" => "Boleto",
            "account_money" => "Saldo MP",
            "credit_card" => "Cartão Crédito"
        );
        $forma = $paymentTypeMappings[$payment_info["response"]["collection"]["payment_type"]] ?? $payment_info["response"]["collection"]["payment_type"];

        $cod = $payment_info["response"]["collection"]["id"];
        $ref = $payment_info["response"]["collection"]["external_reference"];
        $valor = $payment_info["response"]["collection"]["transaction_amount"];
        $acc = $payment_info["response"]["collection"]["reason"];

        $this->SelectMercado($cod);
        $ativado = $this->ListarDados()['ativado'] ?? 0;

        $multiplier = 1;
        if (Config::DOUBLE_POINTS && $valor >= Config::VALUE_DOUBLE) {
            $multiplier = 2;
        } elseif (Config::TRIPLE_POINTS && $valor >= Config::VALUE_TRIPLE) {
            $multiplier = 3;
        }

        if ($this->InserirPedido($cod, $status, $forma, $ref, (int)$valor, $acc, $multiplier)) {
            if ($status == "Pagamento Efetuado" && $ativado == 0) {
                $this->UpdateAccount($acc, $valor, $cod, $multiplier);
                echo '<center><h3>Pagamento Confirmado, pontos creditados em sua conta. Você receberá os pontos em ' . $multiplier . 'x do valor. Obrigado pela sua doação.</h3></center>';
            } elseif ($status == "Pagamento Efetuado" && $ativado == 1) {
                echo '<center><h3>Seus pontos já foram creditados em sua conta!</h3></center>';
            } elseif ($status == "Aguardando Pagamento" && $ativado == 0) {
                echo '<center><h3>Seus pontos estão aguardando o pagamento para liberação!</h3></center>';
            }

            $this->PedidoUpdate($cod, $status, $forma, $ref);

            $this->info = array(
                'pago' => $status,
                'codigo' => $cod,
                'referencia' => $ref,
                'forma_pag' => $forma
            );
        }
    }


    /**
     * grava atualização de status na tabela pedidos
     * @param string $codigo
     * @param string $pago
     * @param string $forma_pag
     * @param string $referencia
     */
    private function InserirPedido($codigo, $pago, $forma_pag, $referencia, $valor, $acc, $multiplier){
        $query = "INSERT INTO mercadopagox (name, forma, valor, ped_ref, id_mercado, status, pontos) ";
        $query .= "VALUES (:name, :forma, :valor, :ref, :cod, :pago, :pontos)";

        $pontos = $valor * $multiplier;

        $params = array(
            ':cod' => $codigo,
            ':pago' => $pago,
            ':forma' => $forma_pag,
            ':ref' => $referencia,
            ':valor' => $valor,
            ':name' => $acc,
            ':pontos' => $pontos
        );

        return $this->ExecuteSQL($query, $params);
    }

    private function PedidoUpdate($codigo, $pago, $forma_pag, $referencia){
        // Montando a SQL
        $query = "UPDATE mercadopagox SET id_mercado = :cod, status = :pago, forma = :forma WHERE ped_ref = :ref";

        // Passando parâmetros                             
        $params = array(
            ':cod' => $codigo,
            ':pago' => $pago,
            ':forma' => $forma_pag,
            ':ref' => $referencia
        );

        // Executando a SQL
        $this->ExecuteSQL($query, $params);
    }

    private function UpdateAccount($accout, $valor, $cod, $multiplier){
        $double_active = Config::DOUBLE_POINTS;
        $triple_active = Config::TRIPLE_POINTS;

        $updatePremiumPoints = $valor * $multiplier;
        $updateBackupPoints = $valor * $multiplier;

        if ($double_active || $triple_active) {
            if ($triple_active && $valor >= Config::VALUE_TRIPLE) {
                $multiplier = 3;
            } elseif ($double_active && $valor >= Config::VALUE_DOUBLE) {
                $multiplier = 2;
            } else {
                $multiplier = 1;
                $updatePremiumPoints = $valor;
                $updateBackupPoints = $valor;
            }
        } else {
            $updatePremiumPoints = $valor;
            $updateBackupPoints = $valor;
        }

        $query = "UPDATE accounts SET premium_points = premium_points + :updatePremiumPoints, backup_points = backup_points + :updateBackupPoints WHERE name = :accout ; ";
        $query .= "UPDATE mercadopagox SET ativado = 1 WHERE id_mercado = :cod ; ";
        $query .= "UPDATE comprovante SET mensagem = 'Aprovado' WHERE mpcode = :cod ;";

        // Passando parâmetros                             
        $params = array(
            ':accout' => $accout,
            ':updatePremiumPoints' => $updatePremiumPoints,
            ':updateBackupPoints' => $updateBackupPoints,
            ':cod' => $cod
        );

        // Executando a SQL
        $this->ExecuteSQL($query, $params);
    }

    private function SelectMercado($id_mercado){
        $query = "SELECT * FROM mercadopagox WHERE id_mercado = :id_mercado";
        
        $params = array(
            ':id_mercado' => $id_mercado
        );

        $result = $this->ExecuteSQL($query, $params);

        if ($result) {
            return $result;
        }
    }

    public function VerificaID($ref){
        $query = "SELECT * FROM mercadopagox WHERE ped_ref = :ref";
        
        $params = array(
            ':ref' => $ref
        );
    
        $result = $this->ExecuteSQL($query, $params);
    
        if ($result) {
            return $result;
            // Faça algo com os dados retornados, se necessário
            // Por exemplo, você pode verificar se existe uma linha correspondente à referência dada.
            // if ($result->rowCount() > 0) {
            //     // Ação a ser tomada caso a referência exista
            // } else {
            //     // Ação a ser tomada caso a referência não exista
            // }
        }
    }
    
    private function GetLista()
    {
        $this->itens = array(); // Inicialize o array de itens

        $i = 1;
        while ($lista = $this->ListarDados()) {
            $item = array(
                'id'        => $lista['id'],
                'name'      => $lista['name'],
                'forma'     => $lista['forma'],
                'ped_ref'   => $lista['ped_ref'],
                'id_mercado'=> $lista['id_mercado'],
                'status'    => $lista['status'],
                'ativado'   => $lista['ativado'],
                'pontos'    => $lista['pontos'],
            );

            $this->itens[$i] = $item;
            $i++;
        }
    }

}
