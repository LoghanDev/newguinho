<?php
class Produto {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    
    //FUNÇÃO LISTAR
    public function listarProdutos() {
        //CONECTANDO NO HOST 
        $conexao = $this->db->getConexao();
        //DEFINIÇÃO DO SQL PARA LISTAR
        $query = "SELECT * FROM Produto WHERE categoria='loghan';";
        //EXECUTA O SQL
        $resultado = $conexao->query($query);
        //ENVIA PARA VARIÁVEL $produto
        $produtos = array();
        while ($row = $resultado->fetch_assoc()) {
            $produtos[] = $row;
        }
        //ENVIA PARA O FRONT END
        return $produtos;
    }

    public function cadastrarProduto($nome, $preco, $foto, $descricao, $categoria) {
        $conexao = $this->db->getConexao();
        $nome = $conexao->real_escape_string($nome);
        $preco = floatval($preco);
        $foto = $conexao->real_escape_string($foto);
        $descricao = $conexao->real_escape_string($descricao);
        $categoria = $conexao->real_escape_string($categoria);
        $query = "INSERT INTO Produto (nome, preco, foto, descricao, categoria) 
        VALUES ('$nome', $preco, '$foto', '$descricao', '$categoria')";
        $resultado = $conexao->query($query);
        return $resultado;
    }

    public function excluirProduto($id) {
        $conexao = $this->db->getConexao();
        $id = intval($id);
        $query = "DELETE FROM Produto WHERE id = $id";
        $resultado = $conexao->query($query);
        return $resultado;
    }


    public function getProdutoPorID($id) {
        $conexao = $this->db->getConexao();
        $id = intval($id); // Certifique-se de converter para um número inteiro
        $query = "SELECT * FROM Produto WHERE id = $id";
        $resultado = $conexao->query($query);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null; // Produto não encontrado
        }
    }
}
?>
