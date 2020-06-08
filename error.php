<?php 
  if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <div class="site-wrap">
   <?php include("./layouts/header.php"); ?> 
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-warning display-3 text-warning"></span>
            <h2 class="display-3 text-black"><?php if (isset($_GET["prd"])) { echo "No se puede eliminar"; } else { echo "Lo sentimos"; } ?></h2>
            <p class="lead mb-5"><?php if (isset($_GET["prd"])) { echo "Este producto tiene pedidos registrados"; } else { echo "No se pudo procesar su pedido."; } ?></p>
            <p>
              <a href="<?php if (isset($_GET['prd'])) { echo 'productos.php'; } else { echo 'cart.php'; } ?>" class="btn btn-sm btn-primary"><?php if (isset($_GET['prd'])) { echo 'Volver al listado'; } else { echo 'Volver a intentar'; } ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php include("./layouts/footer.php"); ?> 
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>