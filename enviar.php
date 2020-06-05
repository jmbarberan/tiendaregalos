<?php 
//llamando a los campos//

$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$correo= $_POST['correo'];
$mensaje= $_POST['mensaje'];

//datos para el correo//
$destinatario = "bazarydetallesmym@gmail.com";
$asunto="Contacto desde nuestra web";

$carta= "De: $nombre \n";
$carta .= "Apellidos: $apellido \n";
$carta .= "Correo: $correo \n";
$carta .= "Mensaje: $mensaje";

//enviando mensaje//
mail($destinatario, $asunto, $carta);
header('Location:mensaje-de-envio.php')


?>