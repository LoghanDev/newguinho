<?php
class ProdutoPedido {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function associarProdutoPedido($idPedido, $idProduto) {
        $conexao = $this->db->getConexao();

        $query = "INSERT INTO ProdutoPedido (idPedido, idProduto) VALUES ($idPedido, $idProduto)";
        $resultado = $conexao->query($query);

        if (!$resultado) {
            // Lidar com erro, se necessário
        }
    }
}
?>
