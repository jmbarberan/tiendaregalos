<?php 
    if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	if(isset($_SESSION['usuario'])) {
        unset($_SESSION['usuario']);
    }

    if(isset($_SESSION['usrid'])) {
        unset($_SESSION['usrid']);
    }

    header("Location: ../index.php");
?>