<?php

require_once(__DIR__ . '/conexao.php');

class Pagamento extends Conexao
{

    public function insertMercadoPago($account, $valor, $mpcode){
        $metodo = 'Mercado Pago';
        $mensagem = 'Aguardando Pagamento';
        
        $valor = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
        $query = 'INSERT INTO comprovante (nome, metodo, mensagem, valor, mpcode) VALUES (:account, :metodo, :mensagem, :valor, :mpcode)';
        
        $params = array(
            ":account" => $account,
            ":metodo" => $metodo,
            ":mensagem" => $mensagem,
            ":valor" => $valor,
            ":mpcode" => $mpcode
        );

        return $this->ExecuteSQL($query, $params);
    }

    public function getDonateList($inicio, $qnt_result_pg, $account){
        $query = "SELECT * FROM comprovante WHERE nome = :account ORDER BY id DESC LIMIT :inicio, :qnt_result_pg";
        $params = array(
            ":account" => $account,
            ":inicio" => (int)$inicio,
            ":qnt_result_pg" => (int)$qnt_result_pg
        );

        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    public function Inserir($anexo){
        $mensagem = 'Pendente';
        $query = "INSERT INTO comprovante (mensagem, anexo) VALUES (:mensagem, :anexo)";
        $params = array(
            ':mensagem' => $mensagem,
            ':anexo' => $anexo
        );

        return $this->ExecuteSQL($query, $params);
    }

    public function updatePayment($id, $anexo){
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $mensagem = "Pendente";
        $query = "UPDATE comprovante SET mensagem = :mensagem, anexo = :anexo WHERE id = :id";

        $params = array(
            ':mensagem' => $mensagem,
            ':anexo' => $anexo,
            ':id' => $id,
        );

        return $this->ExecuteSQL($query, $params);
    }

    public function InsertPaymentNew($account, $metodo, $valor){
        $mensagem = 'Aguardando Pagamento';
        
        $account = filter_var($account, FILTER_SANITIZE_STRING);
        $valor = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
        $metodo = filter_var($metodo, FILTER_SANITIZE_STRING);
        
        $query = "INSERT INTO comprovante (nome, metodo, mensagem, valor) VALUES (:account, :metodo, :mensagem, :valor)";
        
        $params = array(
            ':account' => $account,
            ':metodo' => $metodo,
            ':mensagem' => $mensagem,
            ':valor' => $valor
        );

        return $this->ExecuteSQL($query, $params);
    }

    public function getPagamentosId($id){
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM comprovante WHERE id = :id";

        $params = array(
            ":id" => $id,
        );

        $this->ExecuteSQL($query, $params);
        return $this->GetLista(); // Retornar a lista de resultados
    }

    public function GetPagamentos($account){
        $query = "SELECT * FROM comprovante WHERE nome = :account ORDER BY id DESC";
        $params = array(':account' => $account);

        $this->ExecuteSQL($query, $params);
        return $this->GetLista(); // Retornar a lista de resultados
    }

    public function GetPagamentos2($account){
        $query = "SELECT * FROM comprovante WHERE nome = :account";
        $params = array(':account' => $account);
    
        $this->ExecuteSQL($query, $params);
        return $this->GetLista(); // Retornar a lista de resultados
    }
    
    private function GetLista(){
        $i = 1;
        $this->itens = array(); // Inicializar o array
    
        while ($lista = $this->ListarDados()) {
            $this->itens[$i] = array(
                'id' => $lista['id'],
                'nome' => $lista['nome'],
                'metodo' => $lista['metodo'],
                'email' => $lista['email'],
                'mensagem' => $lista['mensagem'],
                'valor' => $lista['valor'],
                'anexo' => $lista['anexo'],
                'motivo' => $lista['motivo'],
            );
            $i++;
        }
    } 

    public function GetUpdatePointsStatus($id, $pontos, $nome){
        $mensagem = 'Aprovado';

        $query = 'UPDATE `accounts` SET premium_points = premium_points + :pontos, backup_points = backup_points + :pontos WHERE name = :nome;
                UPDATE `comprovante` SET mensagem = :mensagem WHERE id = :id;';

        $params = array(
            ':id' => (int)$id,
            ':pontos' => (int)$pontos,
            ':nome' => $nome,
            ':mensagem' => $mensagem,
        );

        return $this->ExecuteSQL($query, $params);
    }

}
