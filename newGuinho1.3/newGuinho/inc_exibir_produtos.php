<?php
$db = new Database(); //conexão com BD
$produto = new Produto($db); //novo objeto
if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];
    $produtoDetalhado = $produto->getProdutoPorID($idProduto);
} else {
    echo "ID do produto não especificado.";
    exit();
}
?>