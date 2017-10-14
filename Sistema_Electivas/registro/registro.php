<?php	

session_start();

include '../conexion/conexion_db.php';

date_default_timezone_set('America/Bogota');

?>

	<!DOCTYPE html">



	<html>	

	<head>

		<title>Plataforma</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<script src="../../includes/js/jquery-1.11.3.min.js"></script>

		<script src="../../includes/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="../../includes/css/bootstrap.min.css">


		<script src="../../js/registro.js"></script>




	</head>

	<body>		

	<div class="cabecera">

	<div class="container">

	<h1> Plataforma Universitaria</h1>



	</div>

	</div>



	<div class="container">

		<div class="page-content">

			<div class="row ">

				<h3> Registro de Usuario</h3>

				<hr size="2"/>

				<form id="ingresa" method="post" class="form-horizontal">


					<div class="form-group">
						<div class="col-sm-2 col-sm-12">
							<label for="user" class="col-sm-2 control-label">Nombre:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" name="firstname" id="firstname"  placeholder="Nombre" class="texto form-control" value="" required>	
						</div>
						<div class="col-sm-2 col-sm-12">
							<label for="pass" class="col-sm-2 control-label">Apellido: </label>
						</div>
						<div class=" col-sm-4">
							<input type="text" name="lastname" id="lastname"  placeholder="Apellido" class="texto form-control" required>	
						</div>
					</div>
			

					<div class="form-group">
						<div class="col-sm-2 col-sm-12">
							<label for="user" class="control-label">Usuario (E-Mail):</label>
						</div>
						<div class="col-sm-4 col-sm-12">
							<input type="email" name="user" id="user"  placeholder="Correo Electrónico" class="texto form-control" value="" required>	
						</div>
										</div>
			

					<div class="form-group">
						<div class="col-sm-2 col-sm-12">

							<label for="pass" class="control-label">Contraseña : </label>
						</div>
						<div class=" col-sm-4 col-sm-12">
							<input type="password" name="pass" id="pass"  placeholder="Contraseña" class="texto form-control" required>	
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2 col-sm-12">

							<label for="pass" class="control-label">Repita Contraseña : </label>
						</div>
						<div class=" col-sm-4 col-sm-12">
							<input type="password" name="pass" id="rpass"  placeholder="Contraseña" class="texto form-control" required>	
						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-2 col-xs-4" >
							<input type="reset" value="CANCELAR" class="btn btn-default"   id="cancel" >	
						</div>

						<div class="col-sm-10 col-xs-8" >

						<input type="submit" value="REGISTAR" class="btn btn-info"  id="add" >

						</div>

					</div>

				</form>

			</div><!--ROW-->

		</div>

	</div>

	</body>

</html>

