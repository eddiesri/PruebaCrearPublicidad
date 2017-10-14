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
		<script src="../includes/js/jquery-1.11.3.min.js"></script>
		<script src="../includes/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../includes/css/bootstrap.min.css">
		<script src="../js/index.js" type="text/javascript"></script>
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
									asociada a tu correo electronico y una contraseña.
								</p>

							</div>
						</div>

						<form method="post" id="inicio" class="form-horizontal">
						<br/>
							<div class="form-group">
								<div class="col-md-3 col-xs-12 ">
									<label for="usuario" class="control-label">Correo electrónico</label>	
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name='usuario' id='usuario' placeholder='correo@example.com' class="form-control" required>
								</div>	
							</div>
							<input type="hidden" id="rowidpersona" value=''>
							<div class="form-group">
								<div class="col-md-3 col-xs-12">
									<label for="contrasena" class="control-label">Contraseña</label>	
								</div>
								<div class="col-sm-7 col-xs-12">
									<input type="password" name='contrasena' id='contrasena' placeholder='****************************' class="texto form-control" required>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-offset-3 col-md-7 col-xs-12">
									<input type="submit" class="btn btn-primary btn-block" name="entrar" value="Acceder" >
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ///////////////////////////////////////////////////modal contraseña perdida////////////////////////////////////////////////////////////////!-->
	<div class="modal fade " id="myModalcont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	  	<div class="modal-dialog " role="document">
	   		<div class="modal-content">
	     		<div class="modal-header">
	       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       			<h4 class="modal-title" id="myModalLabel">Reestablecer Contraseña</h4>
	     		</div>
	      		<div class="modal-body">
					<form id="ingresacont" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="CorreoResp" class="control-label col-sm-3">Correo Electrónico:</label>
							<div class="col-sm-8">
								<input type="email" name='CorreoResp' id='CorreoResp' placeholder="correo@example.com" required class="texto3 form-control">
							</div>
						</div>
				</div>
				<div class="modal-footer">
						<div class="form-group">
							<div class="col-sm-offset-3">	
								<input type="submit" value="Aceptar" name="anadirp" id="anadirp" class="btn btn-primary">
								<input type="reset" value="Cancelar" name="anadirp" id="anadirp" class="btn btn-danger" data-dismiss="modal">
							</div>
						</div>	
					</form>
				</div>
			</div>	
		</div>
	</div>

	<br><br>
</body>
</html>
	