<?php
require_once 'classes/protocolconverter.php';
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
            
                  <h1>Compra finalizada com sucesso</h1>
                  <h5>Seu pedido foi recebido, anote o seu protocolo para consultar seu status.</h5>
                  <h5>Protocolo: <big class="display-4">A9EF7</big></h5>
                  <h5>

                    <?php
                    if (isset($_GET['idPedido'])) {
                        $idPedido = $_GET['idPedido'];
                        echo "Compra finalizada! Seu ID de pedido é: $idPedido";
                        
                        $protocol = ProtocolConverter::idToProtocol($idPedido);
                        echo "Protocol: $protocol\n";

                    } else {
                        echo "Erro na finalização da compra.";
                    }
                    ?>



                  </h5>
            
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