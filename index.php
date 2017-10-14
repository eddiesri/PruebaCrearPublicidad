<?php
session_start();
date_default_timezone_set('America/Bogota');
if(isset($_SESSION["username"]) && ($_SESSION['password'] ) ){
?>
	<script type="text/javascript">
		// window.location="../home/home.php";
		window.location="home/home.php";
	</script>
	<?php
}
?>
	
	<!DOCTYPE html>

	<html>	
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="includes/js/jquery-1.11.3.min.js"></script>
		<script src="includes/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="includes/css/bootstrap.min.css">
		<script src="js/index.js" type="text/javascript"></script>
	<title>Plataforma</title>
</head>
<body>
<div>
	<div class="col-md-offset-3 col-md-5" >
		<div class="page-header">
			<h1 class="logo hidden-xs"> Plataforma Universitaria <br/>
			</h1>
		</div>
	</div>
	<div class="col-md-offset-3 col-md-6" >
		<div id="pnl-login" class="panel panel-info" style="border-radius:1px;">
			<div class="panel-heading">
				<h3 class="panel-title">Inicio de sesión</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" >
						<div class="row">
							<div class="col-md-12 hidden-xs">
								<p align="justify">
									<br/>
									Bienvenido, para acceder debes disponer de una cuenta de usuario
									asociada a tu código y una contraseña.
								</p>

							</div>
						</div>

						<form method="post" id="inicio" class="form-horizontal">
						<br/>
							<div class="form-group">
								<div class="col-md-3 col-xs-12 ">
									<label for="usuario" class="control-label">Código</label>	
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name='usuario' id='usuario' placeholder='123456' class="form-control" required>
								</div>	
							</div>
							<input type="hidden" id="rowidpersona" value=''>
							<div class="form-group">
								<div class="col-md-3 col-xs-12">
									<label for="contrasena" class="control-label">Contraseña</label>	
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="password" name='contrasena' id='contrasena' placeholder='****************************' class="texto form-control" required>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-offset-3 col-md-7 col-xs-12 ">
									<input type="submit" class="btn btn-primary btn-block" name="entrar" value="Acceder" >
								</div><br><br>
								<div class="col-xs-12 text-center">
								<b> Si no tienes una cuenta en nuestro portal, <a href="registro/registro.php">¿Deseas Registrarte? </a>.</b>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	<br><br>
</body>
</html>
	