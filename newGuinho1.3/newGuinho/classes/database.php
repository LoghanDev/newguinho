<?php
class Database {
    private $host = 'edelzio.com';
    private $usuario = 'edelzi82_aluno';
    private $senha = 'AlunoSenha';
    private $banco = 'edelzi82_newguinho';
    private $conexao;
    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        if ($this->conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->conexao->connect_error);        }
    }
    public function getConexao() {
        return $this->conexao;
    }
}
?>