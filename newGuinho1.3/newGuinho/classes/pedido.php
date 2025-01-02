<?php
class Pedido {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function criarPedido($idCliente) {
        $conexao = $this->db->getConexao();

        $data = date('Y-m-d');
        $status = 'em andamento';

        $query = "INSERT INTO Pedido (idCliente, data, status) VALUES ($idCliente, '$data', '$status')";
        $resultado = $conexao->query($query);

        if ($resultado) {
            return $conexao->insert_id; // Retorna o ID gerado para o pedido
        } else {
            return false; // Retorno de erro, se necessário
        }
    }
}
?>
