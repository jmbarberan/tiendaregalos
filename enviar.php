<?php 
// Guardar en la db
if ($_POST["correo"]) {
    include('./php/conexion.php');
    // Insertar en la db y traer el id insertado
    $nom= rtrim($_POST['nombre'] . " " . $_POST['apellido']);
    $mail= $_POST["correo"];
    $msj= $_POST["mensaje"];
    $cliQry= "INSERT INTO contactos (nombres, email, mensaje, fecha) VALUES ('".$nom."', '".$mail."', '".$msj."', now())";
    $conexion->query($cliQry);
}

//datos para el correo//
$destinatario = "bazarydetallesmym@gmail.com";
$asunto="Contacto desde nuestra web";

$carta = "De: $nom \n";
$carta .= "Correo: $mail \n";
$carta .= "Mensaje: $msj";

//enviando mensaje//
mail($destinatario, $asunto, $carta);
header('Location:mensaje-de-envio.php');

?>