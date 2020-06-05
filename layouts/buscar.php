<?php
$mysqli = new mysqli("localhost", "root", "", "carrito");

$salida= "";
$query= "SELECT * FROM productos ORDER BY descripcion";

if (isset($_POST['consulta'])) {
	$q = $mysqli - > real_escape_string($_POST['consulta']);
	$query = "SELECT * FROM productos WHERE nombre LIKE '%oso%' or nombre LIKE '%chocolates%' ";
}
$resultado = $mysqli - > query($query);
if ($resultado - > num_rows > 0) {
          $salida.= "<table class= 'tabla_datos'>
                     <thead>
                      <td>ID</td>
                      <td>nombre</td>
                      <td>descripcion</td>
                      </tr>
                      </thead>
                      <tbody>";

                      while ($fila = $resultado - > fetch_assoc()) {
                      	$salida.= "<tr>
                         <td>".$fila['productos']."</td>
                         <td>".$fila['nombre']."</td>
                         <td>".$fila['descripcion']."</td>
                         </tr>";
                      }

                      $salida.= "</tbody></table>";
}else {
      $salida.="No hay datos:(";
}

echo $salida;
 $mysqli  - > close();

?>