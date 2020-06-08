<?php 
	if (isset($_GET["id"])) {
		if ($_GET["id"] > 0) {
			include('conexion.php');
			$qryVal= "SELECT count(id) as conteo FROM productos_venta WHERE id_producto = " . $_GET["id"];
			$res= $conexion->query($qryVal) or die($conexion->error);
			$fila= mysqli_fetch_row($res);
			$conteo= $fila[0];
			if ($conteo > 0) {
				header("Location: ../error.php?prd=true");
			} else {
				$qry = "DELETE FROM productos WHERE id = " . $_GET["id"];
				$conexion->query($qry);
				header("Location: ../productos.php");
			}
		}
	}
?>