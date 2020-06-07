<?php 
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	if(isset($_SESSION['carrito'])) {
		include('conexion.php');

		// traer crear cliente
		$cli = 0;
		// buscar por email
		$res=$conexion->query("select id from clientes where email='".$_POST['c_email_address']."'") or die($conexion->error);
		if (count($res) === 1) {
			$fila=mysqli_fetch_row($res);
			$cli=$fila[0];
		} else  {
			// Si no se encuentra por email se buscara por nombre
			if (count($res) <= 0) {
				$nom = rtrim($_POST['c_fname'] + " " + $_POST['c_lname']);
				$res=$conexion->query("select id from clientes where nombres='".$nom."'") or die($conexion->error);
				if (count($res) === 1) {
					$cli=$fila[0];
				}
			}
		}
		// Si no se encuentra el cliente se crea uno nuevo
		if ($cli === 0) {
			// Insertar en la db y traer el id insertado
			$nom= rtrim($_POST['c_fname'] + " " + $_POST['c_lname']);
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
			$pre = $arregloCarrito[$i]['Precio'];
			$can = $arregloCarrito[$i]['Cantidad'];
			$subt = $can * $pre;
			$itemQry = "INSERT INTO productos_venta (id_venta, id_producto, cantidad, precio, subtotal) VALUES (".$ven.", ".$pro.", ".$can.", ".$pre.", ".$subt.")";
			$conexion->query($itemQry);
		}
		unset($_SESSION['carrito']);
		
		header("Location: ../thankyou.php");
	} else {
		header("Location: ../error.php");
	}
?>
