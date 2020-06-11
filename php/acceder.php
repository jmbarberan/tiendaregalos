<?php
    if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	if(isset($_POST['correo']) && isset($_POST['clave'])) {
        // buscar el usuario y la contraseña en la db
        include('conexion.php');
        $usr = 0;
        $cla = md5($_POST['clave']);
		$res=$conexion->query("select id from usuarios where correo='".$_POST['correo']."' AND clave='".$cla."'") or die($conexion->error);
		if ($res->num_rows != 0) {
			$fila= mysqli_fetch_row($res);
            $usr= $fila[0];
            $_SESSION["usuario"]= $usr;
            header("Location: ../productos.php");
		} else  {
            $_SESSION['login_error']= true;
            header("Location: ../login.php");    
        }
    } else {
        $_SESSION['login_error']= true;
        header("Location: ../login.php");
    }
?>