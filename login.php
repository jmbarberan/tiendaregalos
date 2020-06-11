<?php
    if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tienda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
		<link rel="stylesheet" href="css/style.css">
		<style type="text/css">
			.login-form {
				width: 480px;
					margin: 50px auto;
			}
				.login-form form {
					margin-bottom: 15px;
						
						padding: 30px;
				}
				.login-form h2 {
						margin: 0 0 15px;
				}
				.form-control, .btn {
						min-height: 38px;
						border-radius: 2px;
				}
				.btn {        
						font-size: 15px;
						font-weight: bold;
				}
		</style>
  </head>
  <body>
		<div class="login-form">
			<div class="form">
				<form action="./php/acceder.php" method="post">
					<div class="p-3 p-lg-8 border">
						<div class="form-group">
							<div class="col-md-12">
								<label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="email" name="correo" required>
							</div>
							<div class="col-md-12">
								<label for="c_lname" class="text-black">Contraseña<span class="text-danger">*</span></label>
								<input type="password" class="form-control" id="clave" name="clave" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-12">
								<input type="submit" class="btn btn-primary btn-lg btn-block" value="Acceder">
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php if (isset($_SESSION['login_error'])) {
				echo '<div class="alert alert-warning" role="alert">
				El Usuario y/o contraseña no son validos
				</div>';
				unset($_SESSION['login_error']);
			} ?>
		</div>
	</body>
</html>