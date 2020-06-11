<?php
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}
	if (isset($_POST["id"])) {
		$qry = "INSERT INTO productos (nombre, descripcion, precio, imagen, inventario, id_categoria, ocasion) "; 
		$qry .=	"values ('".$_POST["nombre"]."', '".$_POST["descripcion"]."', ".$_POST["precio"].", '".$_POST["imagen"]."', ".$_POST["inventario"].", ".$_POST["categoria"].", '".$_POST["ocasion"]."')";
		if ($_POST["id"] > 0) {
			$qry = "UPDATE productos SET ";
			$qry.= "nombre = '".$_POST["nombre"];
			$qry.= "', descripcion = '".$_POST["descripcion"];
			$qry.= "', precio = ".$_POST["precio"];
			if (isset($_POST["imagen"])) {
				if (!empty($_POST["imagen"]))
					$qry.= ", imagen = '".$_POST["imagen"] . "'";
			}
			$qry.= ", inventario = ".$_POST["inventario"];
			$qry.= ", id_categoria = ".$_POST["categoria"];
			$qry.= ", ocasion = '".$_POST["ocasion"]."' WHERE id =".$_POST["id"];	
		}
		include('conexion.php');
		$conexion->query($qry);
		header("Location: ../productos.php");
	}
?>