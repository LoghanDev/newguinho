<?php
$db = new Database();
$produto = new Produto($db);
$cliente = new Cliente($db);
$pedido = new Pedido($db);
$produtoPedido = new ProdutoPedido($db);

session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $produtoID = $_GET['id'];
    if (!in_array($produtoID, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = $produtoID;
    }
}
// Obtendo os detalhes dos produtos no carrinho
$produtosNoCarrinho = array();
foreach ($_SESSION['carrinho'] as $produtoID) {
    $detalhesProduto = $produto->getProdutoPorID($produtoID);
    if ($detalhesProduto) {
        $produtosNoCarrinho[] = $detalhesProduto;
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $produtoID = $_GET['id'];
    
    // Encontre o índice do produto no array do carrinho
    $indiceProduto = array_search($produtoID, $_SESSION['carrinho']);
    if ($indiceProduto !== false) {
        // Remove o produto do array do carrinho
        array_splice($_SESSION['carrinho'], $indiceProduto, 1);
    }
    // Recarrega a página para refletir a remoção
    header("Location: pedidos.php");
    exit();
}
$totalPreco = 0;
foreach ($produtosNoCarrinho as $produtoCarrinho) {
    $totalPreco += $produtoCarrinho['preco'];
}

$valorEntrega = 20;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'checkout') {
    // Coletar os dados do cliente do formulário
    $nomeCliente = $_POST['nome'];
    $ruaCliente = $_POST['rua'];
    $numeroCliente = $_POST['numero'];
    $bairroCliente = $_POST['bairro'];
    $celularCliente = $_POST['celular'];

    // Inserir cliente na tabela Cliente
    $idCliente = $cliente->cadastrarCliente($nomeCliente, $ruaCliente, $numeroCliente, $bairroCliente, $celularCliente);

    // Criar um novo pedido e obter seu ID
    $idPedido = $pedido->criarPedido($idCliente);

    // Associar produtos comprados ao pedido
    foreach ($_SESSION['carrinho'] as $produtoID) {
        $produtoPedido->associarProdutoPedido($idPedido, $produtoID);
    }

    // Limpar o carrinho
    $_SESSION['carrinho'] = array();

    // Redirecionar ou exibir mensagem de sucesso
    header("Location: compra_finalizada.php?idPedido=$idPedido");
    exit();
}

?>