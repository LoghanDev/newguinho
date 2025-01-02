<?php
class Cliente {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function cadastrarCliente($nome, $rua, $numero, $bairro, $celular) {
        $conexao = $this->db->getConexao();

        $nome = mysqli_real_escape_string($conexao, $nome);
        $rua = mysqli_real_escape_string($conexao, $rua);
        $bairro = mysqli_real_escape_string($conexao, $bairro);
        $celular = mysqli_real_escape_string($conexao, $celular);

        $query = "INSERT INTO Cliente (nome, rua, numero, bairro, celular) VALUES ('$nome', '$rua', $numero, '$bairro', '$celular')";
        $resultado = $conexao->query($query);

        if ($resultado) {
            return $conexao->insert_id; // Retorna o ID gerado para o cliente
        } else {
            return false; // Retorno de erro, se necessário
        }
    }
}
?>
