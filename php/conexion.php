<?php
$servidor="localhost";
$nombreBd="carrito";
$usuario="martin";
$pass="jmbg";
$conexion= new mysqli($servidor,$usuario,$pass,$nombreBd);
if($conexion-> connect_error){
	die("No se pudo conectar");

}
?>