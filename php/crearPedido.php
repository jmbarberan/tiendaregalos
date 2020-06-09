<?php 
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	if(isset($_SESSION['carrito'])) {
		include('conexion.php');
		include('constantes.php');
		// traer crear cliente
		$cli = 0;
		// buscar por email
		$res=$conexion->query("select id from clientes where email='".$_POST['c_email_address']."'") or die($conexion->error);
		if ($res->num_rows != 0) {
			$fila= mysqli_fetch_row($res);
			$cli= $fila[0];
		} else  {
			// Si no se encuentra por email se buscara por nombre
			$nom= rtrim($_POST['c_fname'] . " " . $_POST['c_lname']);
			$res= $conexion->query("select id from clientes where nombres='".$nom."'") or die($conexion->error);
			if ($res->num_rows != 0) {
				$fila= mysqli_fetch_row($res);
				$cli= $fila[0];
			}
		}
		// Si no se encuentra el cliente se crea uno nuevo
		if ($cli == null || $cli == 0) {
			// Insertar en la db y traer el id insertado
			$nom= rtrim($_POST['c_fname'] . " " . $_POST['c_lname']);
			$telf= $_POST["c_phone"];
			$mail= $_POST["c_email_address"];
			$dir= rtrim($_POST['c_address'] . " " . $_POST['c_address2']);
			$dir2= rtrim($_POST["c_diff_address"] . " " . $_POST["c_diff_address2"]);
			$ciu= $_POST["c_state_country"];
			$cod= $_POST["c_postal_zip"];
			$cliQry= "INSERT INTO clientes (nombres, email, telefono, direccion, direccion2, ciudad, codigo_postal) VALUES ('".$nom."', '".$mail."', '".$telf."', '".$dir."', '".$dir2."', '".$ciu."', '".$cod."')";
			if ($conexion->query($cliQry)) {
				$cli= $conexion->insert_id;
			}
		}

		// crear venta
		$total = $_POST["total"];
		$com = $_POST["c_order_notes"];
		$vtaQry = "INSERT INTO ventas (id_cliente, total, fecha, comentarios) VALUES (".$cli.", ".$total.", now(), '".$com."')";
		$conexion->query($vtaQry);
		$ven = $conexion->insert_id;

		// insertar productos vendidos
		$arregloCarrito=$_SESSION['carrito'];
		for($i=0;$i<count($arregloCarrito);$i++) {
			$pro = $arregloCarrito[$i]['Id'];
			$can = $arregloCarrito[$i]['Cantidad'];
			$pre = $arregloCarrito[$i]['Precio'];
			$subt = $can * $pre;
			$itemQry = "INSERT INTO productos_venta (id_venta, id_producto, cantidad, precio, subtotal) VALUES (".$ven.", ".$pro.", ".$can.", ".$pre.", ".$subt.")";
			$conexion->query($itemQry);
		}

		// enviar al correo
		$prods= '<tr>
		<td class="product-thumbnail">';
		$arregloCarrito=$_SESSION['carrito'];
		for($i=0;$i<count($arregloCarrito);$i++) {
			$prods.= '
			<img src="'.BASE_URL.'/images/'.$arregloCarrito[$i]["Imagen"].'" alt="Image" class="img-fluid">
			</td>
			<td class="product-name">
				<h2 class="h5 text-black">'.$arregloCarrito[$i]["Nombre"].'</h2>
			</td>
			<td>'.$arregloCarrito[$i]["Cantidad"].'</td>
			<td>$'.$arregloCarrito[$i]["Precio"].'</td>
			<td>
				$<strong>'.$arregloCarrito[$i]["Precio"] * $arregloCarrito[$i]["Cantidad"].'</strong>
			</td>
			';
		}
		$msj = '
		<html>
		<head>
		<title>Su pedido en Bazar y detalles M&M</title>
		<link rel="stylesheet" href="'.BASE_URL.'/css/bootstrap.min.css">
		<link rel="stylesheet" href="'.BASE_URL.'/css/magnific-popup.css">
		<link rel="stylesheet" href="'.BASE_URL.'/css/jquery-ui.css">
		<link rel="stylesheet" href="'.BASE_URL.'/css/owl.carousel.min.css">
		<link rel="stylesheet" href="'.BASE_URL.'/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="'.BASE_URL.'/css/aos.css">
    	<link rel="stylesheet" href="'.BASE_URL.'/css/style.css">
		</head>
		<body>
		<h1>Su pedido en Bazar y detalles M&M</h1>
		<p>A continuacion se listan los productos adquiridos</p>
		<div class="site-section">
      <div class="container">
        <div class="row mb-5">
					<div class="site-blocks-table">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="product-thumbnail">Imagen</th>
									<th class="product-name">Producto</th>
									<th class="product-quantity">Cantidad</th>
									<th class="product-price">Precio</th>
									<th class="product-total">Subtotal</th>
								</tr>
							</thead>
							<tbody>
							'.$prods.'
							</tbody>
						</table>
					</div>
				</div>

				<div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
            </div>
          </div>
          
          <div class="col-md-6 pl-5">
            <div class=".justify-content-center">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total del pedido</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    $<strong id="txSubtotal" class="text-black">'.$total.'</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    $<trong id="txTotal" class="text-black">'.$total.'</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		</body>
		</html>
		';

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$asunto= 'Su pedido en Bazar y Detalles MyM';
		mail($_POST['c_email_address'], $asunto, $msj, $headers);

		unset($_SESSION['carrito']);
		header("Location: ../thankyou.php");
	} else {
		header("Location: ../error.php");
	}
?>
