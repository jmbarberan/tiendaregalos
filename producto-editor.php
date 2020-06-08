<?php 
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}
	if (!isset($_SESSION["usuario"])) {
		header("Location: index.php");
		return;
	}
	$proId = 0;
	include("./php/conexion.php");
	if(isset($_GET["id"])) {
		// traer producto de la db
		
		$proId= $_GET['id'];
    $resultado= $conexion->query("select * from productos where id=".$_GET['id'])or die($conexion->error); 
    if(mysqli_num_rows($resultado) > 0 ){
      $fila= mysqli_fetch_row($resultado);
		}
	}
	$catres= $conexion->query("select * from categorias order by id")or die($conexion->error); 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tienda MyM &mdash; </title>
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
						<div class="col-md-12">
							<h2 class="h3 mb-3 text-black">Datos del producto</h2>
						</div>
						<div class="col-md-12">
							<form action="./php/guardarProducto.php" method="post">
								<div class="p-3 p-lg-5 border">
									<div class="row">
										<div class="col-md-8">
											<input type="text" hidden name="id" value="<?php echo $proId ?>">
											<div class="form-group row">
												<div class="col-md-6">
													<label for="c_categ" class="text-black">Categoria<span class="text-danger">*</span></label>
													<select id="c_categ" name="categoria" class="form-control">
															<option value="0">Seleccionar categoria</option>
															<?php 
																while($fcat=mysqli_fetch_array($catres)) {
																	$sel = '';
																	if($proId > 0) {} {
																		if ($fila[6] > 0 && $fila[6] == $fcat[0])
																			$sel = ' selected';
																	}
																	echo '<option value="'.$fcat[0].'"'.$sel.'>'.$fcat[1].'</option>';
																}
															?>        
													</select>
												</div>
												<div class="col-md-6">
													<label for="c_ocasion" class="text-black">Ocasion</label>
													<input type="text" class="form-control" id="c_ocasion" name="ocasion" value="<?php if($proId > 0) { echo $fila[7]; } ?>"></input>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_name" class="text-black">Nombre <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="c_name" name="nombre" required value="<?php if($proId > 0) { echo $fila[1]; } ?>"></input>
												</div>
											</div>
											<div class="form-group row">  
												<div class="col-md-12">
													<label for="c_descrip" class="text-black">Descripcion</label>
													<textarea type="text" class="form-control" id="c_descrip" name="descripcion" rows="6"><?php if($proId > 0) { echo $fila[2]; } ?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6">
													<label for="c_precio" class="text-black">Precio <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="c_precio" name="precio" required value="<?php if($proId > 0) { echo $fila[3]; } ?>"></input>
												</div>
												<div class="col-md-6">
													<label for="c_inv" class="text-black">Inventario en stock <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="c_inv" name="inventario" required value="<?php if($proId > 0) { echo $fila[5]; } ?>"></input>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-12">
													<input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<h2>Imagen del producto</h2>
											<div class="f_p_item">
												<div class="f_p_img">
													<img id="proimg" class="img-fluid" src="<?php if($proId > 0) { echo './images/' . $fila[4]; } ?>" alt="">
												</div>
												<div class="form-group col-md-12">
													<label labelfor="imagen">Seleccionar imagen</label> 
													<input type="file" class="form-control-file" id="imagen" onchange="putImage()" name="imagen"> 
												</div> 
											</div>
										</div>
									</row>
								</div>
							</form>
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
		<script type="text/javascript">
			var iniciando = false;
			function showImage(src, target) {
					var fr = new FileReader();
					fr.onload = function() {
							target.src = fr.result;
					}
					fr.readAsDataURL(src.files[0]);
			}        

			function putImage() {
					if (!iniciando)
					{
							var src = document.getElementById("imagen");
							var target = document.getElementById("proimg");
							showImage(src, target);    
					}
			}
		</script>
  </body>
</html>