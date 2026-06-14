<?php

require_once(__DIR__ . '/config.php');

class Conexao extends Config
{
    private $host, $user, $senha, $banco;
    protected $obj, $itens = array(), $prefix;
    public $paginacaolinks;
    public $totalpags;

    public function __construct()
    {
        $this->host = self::BD_HOST;
        $this->user = self::BD_USER;
        $this->senha = self::BD_SENHA;
        $this->banco = self::BD_BANCO;
        $this->prefix = self::BD_PREFIX;

        try {
            $this->Conectar(); // Tente conectar diretamente
        } catch (Exception $e) {
            exit($e->getMessage() . ' <h2>OPS... Erro no banco de dados, tente novamente mais tarde</h2>');
        }
    }
    /**
     * 
     * @return \PDO link  com dados da conexao
     */
    private function Conectar(){
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Usar ERRMODE_EXCEPTION para um tratamento de erro mais detalhado
        );

        try {
            $link = new PDO(
                "mysql:host={$this->host};dbname={$this->banco}",
                $this->user,
                $this->senha,
                $options
            );
            return $link;
        } catch (PDOException $e) {
            // Tratar exceções do PDO aqui
            exit("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }

    function ExecuteSQL($query, array $params = NULL){
        try {
            $this->obj = $this->Conectar()->prepare($query);

            if ($params !== null && is_array($params)) {
                foreach ($params as $key => $value) {
                    $this->obj->bindValue($key, $value);
                }
            }

            return $this->obj->execute();
        } catch (PDOException $e) {
            // Tratar exceções do PDO aqui
            exit("Erro ao executar a consulta: " . $e->getMessage());
        }
    }

    function ListarDados(){
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }

    function TotalDados(){
        return $this->obj->rowCount();
    }

    function GetItens(){
        return $this->itens;
    }

    function PaginacaoLinks($campo, $tabela){
        // Instancia o objeto de paginação
        $pag = new Paginacao();

        // Executo a base da paginação
        $pag->GetPaginacao($campo, $tabela);

        // Recebo os links das paginas pelo numero de paginas
        $this->paginacaolinks = $pag->link;

        // Recebo o total de paginas
        $this->totalpags = $pag->totalpags;

        // Defino o início e o fim para limitar a query
        $inicio = $pag->inicio;
        $limite = $pag->limite;

        // Retorna a cláusula LIMIT para a consulta SQL
        if ($this->totalpags > 0) {
            return " LIMIT {$inicio}, {$limite}";
        } else {
            return "";
        }
    }

    /*
     * retorna uma lista  com as paginas para escolher
     */
    protected function Paginacao($paginas = array()){
        // Monta a UL (LISTA) com os itens da paginação
        $pag = '<ul class="pagination">';

        $pag .= '<li class="page-item"><a class="page-link" href="index.php?subtopic=accountmanagement?p=1"><< Início</a></li>';
        error_reporting(0);
        foreach ($paginas as $p) {
            $pag .= '<li class="page-item"><a class="page-link" href="index.php?subtopic=accountmanagement?p=' . $p . '">' . $p . '</a></li>';
        }

        $pag .= '<li class="page-item"><a class="page-link" href="index.php?subtopic=accountmanagement?p=' . $this->totalpags . '">Última >> </a></li>';

        $pag .= '</ul>';

        // Retorna a paginação somente se tiver mais de uma página de itens
        if ($this->totalpags > 1) {
            return $pag;
        }
    }

    /**
     * 
     * @return array com a paginaçao em links
     */
    function ShowPaginacao(){
        // Retorna a paginação utilizando a função Paginacao melhorada
        return $this->Paginacao($this->paginacaolinks);
    }

}
