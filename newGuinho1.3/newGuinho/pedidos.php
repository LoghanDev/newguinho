<?php
require_once 'classes/database.php';
require_once 'classes/produto.php';
require_once 'classes/cliente.php';
require_once 'classes/pedido.php';
require_once 'classes/produtoPedido.php';
require_once 'inc_pedidos.php';

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
                  <div class="col-lg-7">
                    <h5 class="mb-3"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Continuar comprando</a></h5>
                    <hr>

                    <!-- FOR DO ITEM AQUI -->
                    <?php foreach ($produtosNoCarrinho as $produtoCarrinho) { ?>
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="https://edelzio.com/uploads/<?php echo $produtoCarrinho['foto']; ?>" class="img-fluid rounded-3" style="width: 80px; margin-right:10px;">
                            </div>
                            <div class="ms-3">
                              <h5><?php echo $produtoCarrinho['nome']; ?></h5>
                              <p class="small mb-0"><?php echo $produtoCarrinho['descricao']; ?></p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div class="d-flex mb-4" style="max-width: 150px; margin-top: 25px;  margin-right: 20px;">
                              <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                <i class="fas fa-minus"></i>
                              </button>
                              <div class="form-outline">
                                <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                              </div>
                              <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <div style="width: 90px;">
                              <h5 class="mb-0">R$ <?php echo number_format($produtoCarrinho['preco'], 2, ',', '.'); ?></h5>
                            </div>
                            <a href="pedidos.php?action=remove&id=<?php echo $produtoCarrinho['id']; ?>" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>  
                    <!-- FIM FOR DO ITEM AQUI -->
                  
                  
                  </div>
                  <div class="col-lg-5">
                    <div class="card bg-primary text-white rounded-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="mb-0">Detalhes do Cliente</h5>
                        </div>


                        <form class="mt-4" method="POST" action="pedidos.php?action=checkout">
                          <div class="form-outline form-white mb-3">
                            <label class="form-label">Nome:</label>
                            <input type="text" name="nome" class="form-control form-control-lg" required/>
                          </div>
                          <div class="form-outline form-white mb-3">
                            <label class="form-label">Rua:</label>
                            <input type="text" name="rua" class="form-control form-control-lg" required/>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <div class="form-outline form-white">
                                <label class="form-label">Número:</label>
                                <input type="text" name="numero" class="form-control form-control-lg" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-outline form-white">
                                <label class="form-label">Bairro:</label>
                                <input type="text" name="bairro" class="form-control form-control-lg" required/>
                              </div>
                            </div>
                          </div>
                          <div class="form-outline form-white mb-3">
                            <label class="form-label">Celular:</label>
                            <input type="text" name="celular" class="form-control form-control-lg" placeholder="(00)90000-0000" required/>
                          </div>
                          <button type="submit" class="btn btn-info btn-block btn-lg">
                            <div class="d-flex justify-content-between">
                              <span></span>
                              <span>Finalizar Compra <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                            </div>
                          </button>
                        </form>


                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2">R$ <?php echo number_format($totalPreco, 2, ',', '.'); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Entrega</p>
                          <p class="mb-2">R$ 20,00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p>Total</p>
                          <p>R$ <?php  echo $totalPreco==0 ? "0,00" : number_format($totalPreco+$valorEntrega, 2, ',', '.'); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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