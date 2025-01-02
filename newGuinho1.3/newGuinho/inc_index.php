<?php
$db = new Database();
$produto = new Produto($db);
$produtos = $produto->listarProdutos();
?>