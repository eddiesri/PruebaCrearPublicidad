<?php
session_start();
/* Plantilla HTML de la página del home, con las restricciones de usuario administrador*/
date_default_timezone_set('America/Bogota');
if(isset($_SESSION["username"]) && ($_SESSION['password'] ) ){
?>
<!DOCTYPE html>
	<html>	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="../includes/js/jquery-1.11.3.min.js"></script>
		<script src="../includes/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../includes/css/bootstrap.min.css">
		<script src="../js/home.js" type="text/javascript"></script>
	<title>Plataforma</title>
	
</head>
<body>
	<br>

		<div class="col-xs-12">
			
				<div class="panel panel-default">
				  <div class="panel-body">
				  <h1>Bienvenido a la Plataforma Universitaria</h1>
				  <br>
	
						

						<p>Usuario : <?php echo $_SESSION['username']; ?></p>
						<p>Código : <?php echo $_SESSION['code']; ?></p>
						<p>Nombre : <?php echo $_SESSION['firstname']; ?></p>
						<p>Apellido : <?php echo $_SESSION['lastname'] ?></p>
						<p><a href="../Salir.php" class="btn btn-danger"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Salir</a>
							
						</p>

					

				</div>
			</div>

		</div>
		<br>
	
			<div class="col-xs-12">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Electivas</h3>
				  </div>
				  <div class="panel-body" style="overlflow-x:scroll">
				   <div class="row" >
					<div class="form-group">
						<div class="col-md-2 col-xs-12">
							<label for="busq" class="control-label">Buscar por:</label>	
						</div>
						<div class="col-md-3 col-xs-12">
							<select id="tipobusq" class="form-control">
								<option Value=""> N/D </option>
								<option Value="nombre"> Nombre </option>
								<option Value="profesor"> Profesor </option>
							</select> 
						</div>
						<div class="col-md-3 col-xs-12">
							<input type="text" name='busq' id='busq' placeholder='' class="texto form-control" required>
						</div>
						<div class="col-md-3 col-xs-12">
							<button type="button" class="btn btn-info"  id="search">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								Buscar
							</button>
							<?php if($_SESSION['admin'] == '1'){ echo'
							<button type="button" class="btn btn-success"  id="new">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								Nuevo
							</button>
							';} ?>

						</div>
					</div>
				   </div>
				   <br>
				    <div class="row" >
						<ul class="list-group" id="lista_electivas">
						<li class="list-group-item">No hay electivas</li>
						</ul>
					</div>

				  </div>
				</div>
			</div>			

			<div class="col-xs-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">Estudiantes</h3>
				  </div>
				  <div class="panel-body">
				   <div class="row" >
					<div class="form-group">
						<div class="col-md-2 col-xs-12">
							<label for="busq" class="control-label">Buscar:</label>	
						</div>
						<div class="col-md-3 col-xs-12">
							<input type="text" id='busq_est' placeholder='' class="texto form-control" required>
						</div>
						<div class="col-md-3 col-xs-12">
							<button type="button" class="btn btn-info"  id="search_est">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								Buscar
							</button>
							<?php if($_SESSION['admin'] == '1'){ echo'
							<button type="button" class="btn btn-success"  id="new_est">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								Nuevo
							</button>
							';} ?>

						</div>
					</div>
				   </div>
				   <br>
				    <div class="row" >
						<ul class="list-group" id="lista_estudiantes">

						</ul>
					</div>

				  </div>
				</div>
			</div>	


	<div class="modal fade " id="myModalElectiva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	  	<div class="modal-dialog " role="document">
	   		<div class="modal-content">
	     		<div class="modal-header">
	       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       			<h4 class="modal-title" id="myModalLabel">Guardar Electiva</h4>
	     		</div>
	      		<div class="modal-body">
					<form id="ingresaelectiva" method="post" class="form-horizontal">

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="nombre" class=" control-label">Nombre:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" id="nombre"  placeholder="Nombre" class="electcampos form-control" value="" required>	
						</div>
					</div>	
					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="prof" class=" control-label">Profesor:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" id="prof"  placeholder="Profesor" class="electcampos form-control" value="" required>	
						</div>
					</div>			

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="descr" class=" control-label">Descripción:</label>
						</div>
						<div class="col-sm-8">
							<textarea id="descr" class="electcampos form-control" rows="5"></textarea>
						</div>
					</div>			
					
					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="cupos" class=" control-label">Cupos Totales:</label>
						</div>
						<div class="col-sm-8">
							<input type="number"  id='cupos' placeholder="Cupos Totales" min="1" value=0 required class="electcampos form-control">
						</div>
					</div>			
					<input type="hidden" id="id_elect" value='' class="electcampos form-control">		
				</div>
				<div class="modal-footer">
						<div class="form-group">
							<div class="col-sm-offset-3">	
								<input type="submit" value="Aceptar" class="btn btn-primary">
								<input type="reset" value="Cancelar" class="btn btn-danger" data-dismiss="modal">
							</div>
						</div>	
					</form>
				</div>
			</div>	
		</div>
	</div>
<div class="modal fade " id="myModalMateriasEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog " role="document">
	   	<div class="modal-content">
	     	<div class="modal-header">
       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       			<h4 class="modal-title" id="myModalLabel">Electivas Inscritas</h4>
     		</div>
      		<div class="modal-body">
      		    <div class="row" >
					<ul class="list-group" id="lista_electivas_estudiante">

					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>	
	</div>
</div>

<div class="modal fade " id="myModalEstudiantesMateria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog " role="document">
	   	<div class="modal-content">
	     	<div class="modal-header">
       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       			<h4 class="modal-title" id="myModalLabel">Estudiantes Inscritos</h4>
     		</div>
      		<div class="modal-body">
      		    <div class="row" >
					<ul class="list-group" id="lista_estudiantes_electiva">

					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>	
	</div>
</div>
<div class="modal fade " id="myModalEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	  	<div class="modal-dialog " role="document">
	   		<div class="modal-content">
	     		<div class="modal-header">
	       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       			<h4 class="modal-title" id="myModalLabel">Guardar Estudiante</h4>
	     		</div>
	      		<div class="modal-body">
					<form id="ingresaestudiante" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="user" class=" control-label">Nombre:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="firstname" id="firstname"  placeholder="Nombre" class="estcampos form-control" value="" required>	
						</div>
					</div>
			

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="pass" class=" control-label">Apellido: </label>
						</div>
						<div class=" col-sm-8">
							<input type="text" name="lastname" id="lastname"  placeholder="Apellido" class="estcampos form-control" required>	
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="pass" class=" control-label">Código: </label>
						</div>
						<div class=" col-sm-8">
							<input type="text" name="code" id="code"  placeholder="Código" class="estcampos form-control" required>	
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">
							<label for="user" class="control-label">Usuario (E-Mail):</label>
						</div>
						<div class="col-sm-8 col-xs-12">
							<input type="email" name="user" id="user"  placeholder="Correo Electrónico" class="estcampos form-control" value="" required>	
						</div>
										</div>
			

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">

							<label for="pass" class="control-label">Contraseña : </label>
						</div>
						<div class=" col-sm-8 col-xs-12">
							<input type="password" name="pass" id="pass"  placeholder="Contraseña" class="estcampos form-control" required>	
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-xs-12">

							<label for="pass" class="control-label">Repita Contraseña : </label>
						</div>
						<div class=" col-sm-8 col-xs-12">
							<input type="password" name="pass" id="rpass"  placeholder="Contraseña" class="estcampos form-control" required>	
						</div>
					</div>
					<input type="hidden" id="id_est" value='' class="estcampos form-control">
				</div>
				<div class="modal-footer">
						<div class="form-group">
							<div class="col-sm-offset-3">	
								<input type="submit" value="Aceptar" class="btn btn-primary">
								<input type="reset" value="Cancelar" class="btn btn-danger" data-dismiss="modal">
							</div>
						</div>	
					</form>
				</div>
			</div>	
		</div>
	</div>

</body>
</html>
}else{
?>

<script type="text/javascript">
	window.location="../index.php";// ir al inicio
</script>
<?php
}
?>