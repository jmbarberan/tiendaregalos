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
                <div class="float-md-left mb-4"><h2 class="text-black h5">Productos</h2></div>
              </div>
            </div>
            <div class="row mb-5">
            <?php 
              include('./php/conexion.php');
              include('./php/constantes.php');
              $pag = 1;
              $url = basename($_SERVER ["PHP_SELF"]);
              if (isset($_GET["pag"]))
              {
                  $pag = $_GET["pag"];
              }
              $pagsTotal = 1;
              $res = $conexion->query("SELECT count(id) as conteo FROM productos");
              $row = $res->fetch_row();
              $pagsTotal = $row[0];
              if ($pagsTotal != false) {
                if ($pagsTotal > 0)
                    $pagsTotal = ceil($pagsTotal / ITEMS_PAGINACION);
              }
              $limite = ($pag-1) * ITEMS_PAGINACION;
              $resultado = $conexion->query("select * from productos LIMIT " . $limite . ", " . ITEMS_PAGINACION) or die($conexion ->error);
              while($fila = mysqli_fetch_array($resultado)) {
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
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <?php 
                      if(($pag - 1) == 0)
                      {
                        echo "<li><a href='#'>&lt;</a></li>";
                      }
                      else
                      {
                        echo "<li><a href='$url?pag=".($pag - 1)."'><b>&lt;</b></a></li>";
                      }
                      for($k=1; $k <= $pagsTotal; $k++)
                      {
                        if($pag == $k)
                        {
                          echo "<li><a href='#'><b>".$k."</b></a></li>";
                        }
                        else
                        {
                          echo "<li><a href='$url?pag=$k'>".$k."</a></li>";
                        }
                      }
                      if($pag == $pagsTotal)
                      {
                        echo "<li><a href='#'>&gt;</a></li>";
                      }
                      else
                      {
                        echo "<li><a href='$url?pag=".($pag+1)."'><b>&gt;</b></a></li>";
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
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
        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>MOMENTOS FELICES PARA QUIENES MAS AMAS</h2>
                  </div>
                </div>
                <div class="row">
                  <?php 
                    $rescat = $conexion->query("select * from categorias") or die($conexion ->error);
                    while($fcat = mysqli_fetch_array($rescat)) {
                  ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                      <a class="block-2-item" href="categoria.php?cat=<?php echo $fcat['id'] ?>">
                        <figure class="image">
                          <img src="<?php echo $fcat['imagen'] ?>" alt="<?php echo $fcat['imagen'] ?>" class="img-fluid">
                        </figure>
                        <div class="text">
                          <span class="text-uppercase"><?php echo $fcat['descripcion'] ?></span>
                          <h3><?php echo $fcat['nombre'] ?></h3>
                        </div>
                      </a>
                    </div>
                  <?php 
                    }
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("./layouts/header.php"); ?> 
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