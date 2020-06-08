<?php 
  if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tienda</title>
    <meta charset="UTF-8">
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
        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row">
              <div class="col-md-12 mb-5">
                <?php 
                    $categoria = 1;
                    if (isset($_GET["cat"]))
                    {
                        $categoria = $_GET["cat"];
                    }
                    $catnom = "Mujeres";
                    if (isset($_GET["cat"]))
                    {
                        $categoria = $_GET["cat"];
                    }
                    include('./php/conexion.php');
                    $rescat = $conexion->query("SELECT nombre FROM categorias WHERE id = $categoria") or die($conexion ->error);
                    $catrow = $rescat->fetch_row();
                    $catnom = $catrow[0];
                ?>    
                <div class="float-md-left mb-4"><h2 class="text-black h5">Productos para <?php echo $catnom ?></h2></div>
              </div>
            </div>
            <div class="row mb-5">
            <?php 
                //include('./php/conexion.php');
                $resultado = $conexion->query("SELECT * FROM productos WHERE id_categoria = $categoria") or die($conexion ->error);
                while($fila=mysqli_fetch_array($resultado)){
            ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="shop-single.php?id=<?php echo $fila['id'];?>">
                    <img src="images/<?php echo $fila['imagen'];?>" alt="<?php echo $fila['nombre'];?>" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h3>
                    <p class="mb-0"><?php echo $fila['descripcion'];?></p>
                    <p class="text-primary font-weight-bold">$<?php echo $fila['precio'];?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <p class="bg-danger text-white">POR FAVOR LEER</p>
                <h3 class="mb-3 h6 text-uppercase text-black d-block">CUALQUIER DETALLE SOLO ESTA DISPONIBLE PARA ENVÍO A LA CIUDAD DE GUAYAQUIL Y SUS ALREDEDORES / Envío 24-48 horas. Cualquier duda comunicarse a nuestro correo: bazarydetallesmym@gmail.com</h3>
              </div>
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">
                Si algún artículo no está disponible a corto plazo, será reemplazado por uno equivalente o superior, gracias.</h3>
              </div>
            </div>
          </div>
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