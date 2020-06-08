<?php 
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}
	/*if (!isset($_SESSION["usuario"])) {
		header("Location: index.php");
		return;
	}*/

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
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
			<?php include("./layouts/header2.php"); ?> 
			<div class="site-section">
				<div class="container">
				<div class="row">
						<div class="col-md-6">
							<div class="row mb-5">
								<div class="col-md-6 mb-3 mb-md-0">
									<button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='producto_crear.php'">Crear producto</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-5">
						<form class="col-md-12" method="post">
							<div class="site-blocks-table">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th class="product-thumbnail">Imagen</th>
											<th class="product-name">Producto</th>
											<th class="product-price">Precio</th>
											<th class="product-quantity">Inventario</th>
											<th class="product-remove">Modificar</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										include('./php/conexion.php');
										$resultado = $conexion->query("select * from productos order by nombre") or die($conexion ->error);
              			while($fila = mysqli_fetch_array($resultado)) {
									?>
										<tr>
											<td class="product-thumbnail">
												<img src="images/<?php echo $fila['imagen']; ?>" alt="Image" class="img-fluid">
											</td>
											<td class="product-name">
												<h2 class="h5 text-black"><?php echo $fila['nombre']; ?></h2>
											</td>
											<td>
												$<?php echo $fila['precio']; ?>
											</td>
											<td>
												<?php echo $fila['inventario']; ?>
											</td>
											<td>
												<a href="#" title="Modificar" class="btn btn-primary btn-sm btnModificar" data-id="<?php echo $fila['id']; ?>"><span class="icon icon-pencil"></span></a>
												<a href="#" title="Eliminar" class="btn btn-danger btn-sm btnEliminar"  data-id="<?php echo $fila['id']; ?>"><span class="icon icon-minus"></span></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php include("./layouts/footer.php"); ?> 
		</div>
	</body>
</html>	