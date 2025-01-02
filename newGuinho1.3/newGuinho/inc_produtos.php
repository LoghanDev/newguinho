<?php
$db = new Database();
$produto = new Produto($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    
    // Upload da foto
    $foto = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];

    // Configurações do servidor FTP
    $ftp_server = 'ftp.edelzio.com';
    $ftp_user = 'aluno@edelzio.com';
    $ftp_pass = 'AlunoSenha';
    $ftp_upload_dir = '/'; // O diretório no servidor FTP onde deseja fazer o upload

    // Conexão ao servidor FTP
    $conn_id = ftp_connect($ftp_server);
    ftp_login($conn_id, $ftp_user, $ftp_pass);

    // Upload do arquivo
    if (ftp_put($conn_id, $ftp_upload_dir . $foto, $foto_temp, FTP_BINARY)) {
        // Upload bem-sucedido
        $produto->cadastrarProduto($nome, $preco, $foto, $descricao, $categoria);
    } else {
        // Erro no upload
        echo "Erro ao fazer o upload do arquivo para o servidor FTP.";
    }

    // Fechando a conexão FTP
    ftp_close($conn_id);
}

if (isset($_GET['delete'])) {
  $idToDelete = $_GET['delete']; 
  $resultado = $produto->excluirProduto($idToDelete);
  if ($resultado) {
      header("Location: produtos.php");
      exit();
  } else {
      echo "Erro ao deletar o registro.";
  }
}
$produtos = $produto->listarProdutos();
?>