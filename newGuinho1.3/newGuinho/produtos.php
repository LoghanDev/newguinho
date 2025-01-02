<?php
require_once 'classes/database.php';
require_once 'classes/produto.php';
require_once 'inc_produtos.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Guinho Carros</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php"><img style="height: 100px; margin-bottom: -30px;" src="assets/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Sobre nós</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Implementar</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Categorias</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Cat A</a></li>
                                <li><a class="dropdown-item" href="#!">Cat B</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="pedidos.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrinho de Compras
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header style="background: #edede3;">
            <div class="container">
                <img src="assets/banner_VD_desk.jpg" style="max-width: 100%;" class="img-fluid">
            </div>
        </header>


        

    <section class="h-100 h-custom" style="margin-top: -30px;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">
                <div class="row">
  

                  <h2 align="center" style="margin-top: 20px;">:: Gerenciador de Produtos</h2>
                  <form method="POST" action="produtos.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Nome">Nome: </label>
                        <input class="form-control" type="text" name="nome">          
                      </div>
                      <div class="form-group">
                          <label for="Preco">Preço: </label>
                          <input class="form-control" type="text" placeholder="00.00" name="preco">          
                      </div>
                      <div class="form-group">
                          <label for="Preco">Foto: </label>
                          <input class="form-control" type="file" name="foto">          
                      </div>
                      <div class="form-group">
                          <label for="Preco">Descrição: </label>
                          <input class="form-control" type="text" name="descricao">          
                      </div>
                      <div class="form-group">
                          <label for="Preco">Categoria: </label>
                          <input class="form-control" type="text" name="categoria">          
                      </div>
                      <button type="submit" class="btn btn-primary my-3" style="float: right; width: 200px;">Salvar</button>
                  </form>
            
                  <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Preço</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Categoria</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($produtos as $prod) { ?>
                        <tr>
                          <th scope="row"><?php echo $prod['id']; ?></th>
                          <td><?php echo $prod['nome']; ?></td>
                          <td><?php echo $prod['preco']; ?></td>
                          <td><img src="https://edelzio.com/uploads/<?php echo $prod['foto']; ?>" width="180"></td>
                          <td><?php echo $prod['categoria']; ?></td>
                          <td>
                              <button type="button" class="btn btn-success">Editar</button>
                              <a class="btn btn-danger" href="produtos.php?delete=<?php echo $prod['id']; ?>">Deletar</a>
                          </td>
                        </tr>
                      <?php } ?>  
                      </tbody>
                    </table>


          
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 

    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Guinho Carros 2023</p></div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/17a7536ca4.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    </body>
</html>                  