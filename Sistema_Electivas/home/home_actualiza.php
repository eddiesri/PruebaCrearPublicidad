<?php 
session_start();
include '../conexion/conexion_db.php';
date_default_timezone_set('America/Bogota');

//Registrar un nuevo negocio

if (isset($_POST['buscar_electivas'])){
	if ($_POST['criterio'] == 'nombre'){
		$query = "SELECT * FROM electivecourse Where name LIKE ('%$_POST[valor]%')";
	}elseif ($_POST['criterio'] == 'profesor') {
		$query = "SELECT * FROM electivecourse Where teacher LIKE ('%$_POST[valor]%')";
	}else{
		$query = "SELECT * FROM electivecourse";
	}

	$sql1= mysqli_query($con,$query);
	while($fila1=mysqli_fetch_array($sql1)){
		echo '<li class="list-group-item">
				<div class="col-xs-6">
					<b>'.$fila1['name'].'</b><br>'.$fila1['description'].'<br> Profesor(a) :'.$fila1['teacher'].'<br> Cupos totales :'.$fila1['total'].'<br> Cupos disponibles :'.$fila1['available'].'
				</div>
				<div class="col-xs-6">';
		echo '	<a idestudianteselect="'.$fila1['id'].'"class="btn btn-warning btn-xs estudianteselect" href="#?idestudianteselect="'.$fila1['id'].'"> Estudiantes </a>';
		$fila2=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users_x_electivecourse Where user='$_SESSION[id]' and elective_course='$fila1[id]'"));
		if($fila2['user']){
		echo '	<a idinscrelect="'.$fila1['id'].'"class="btn btn-danger btn-xs inscrelect" href="#?idinscrelect="'.$fila1['id'].'"> Salir de la Electiva </a>';
		}else{
		echo '  <a idinscrelect="'.$fila1['id'].'"class="btn btn-success btn-xs inscrelect" href="#?idinscrelect="'.$fila1['id'].'"> Inscribirse </a>';	
		}
		if($_SESSION['admin'] == '1'){
		echo '	<a ideditarelect="'.$fila1['id'].'"class="btn btn-info btn-xs editarelect" href="#?ideditarelect="'.$fila1['id'].'"> Editar </a>';
		echo '	<a idborrarelect="'.$fila1['id'].'"class="btn btn-danger btn-xs borrarelect" href="#?idborrarelect="'.$fila1['id'].'"> Borrar </a>';
	}
		echo '		
				</div><br><br><br> <br> <br>
			  </li>';
	}
	exit();
}

if (isset($_POST['gestion_inscripcion'])){
	$fila2=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users_x_electivecourse Where user='$_SESSION[id]' and elective_course='$_POST[id_elect]'"));
	if ($fila2){
		$fila1=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM electivecourse Where id ='$_POST[id_elect]' "));

		$disponible= $fila1['available'] + 1;
		$ocupado= $fila1['occupied'] - 1;
		if ($ocupado >= 0){
			mysqli_query($con,"DELETE FROM users_x_electivecourse Where user='$_SESSION[id]' and elective_course='$_POST[id_elect]' ");
			mysqli_query($con,"UPDATE electivecourse SET available='$disponible' , occupied='$ocupado'   WHERE id='$_POST[id_elect]' ");
		}else{
			echo "cupo_min";
		}
	}else{
		$fila1=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM electivecourse Where id ='$_POST[id_elect]' "));
		$disponible= $fila1['available'] - 1;
		$ocupado= $fila1['occupied'] + 1;
		if ($disponible >= 0){
			mysqli_query($con,"INSERT INTO users_x_electivecourse (user ,elective_course) VALUES ('$_SESSION[id]','$_POST[id_elect]')");
			mysqli_query($con,"UPDATE electivecourse SET available='$disponible' , occupied='$ocupado'   WHERE id='$_POST[id_elect]' ");
		}else{
			echo "cupo_max";
		}
	}
	exit();
}

if (isset($_POST['nueva_electiva'])){
	if ($_POST['id_elect'] == ''){

		mysqli_query($con,"INSERT INTO electivecourse (name ,teacher,description,available,total,occupied) 
			VALUES ('$_POST[nombre]','$_POST[prof]','$_POST[descr]','$_POST[cupos]','$_POST[cupos]','0')");
			echo "ok";

	}else{
		$fila1=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM electivecourse Where id ='$_POST[id_elect]' "));

		$ocupado= $fila1['occupied'];
		$disponibles= $_POST['cupos'] - $fila1['occupied'];
		if ($disponibles>0){
			mysqli_query($con,"UPDATE electivecourse SET name='$_POST[nombre]' ,teacher='$_POST[prof]' ,description='$_POST[descr]' ,available='$disponibles' ,total='$_POST[cupos]'   WHERE id='$_POST[id_elect]' ");
			echo "ok";			
		}else{
			echo "no";
		}

	}
	exit();
}

if (isset($_POST['datos_electiva'])){
	$fila=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM electivecourse Where id='$_POST[id_elect]'"));
	echo $fila['name'].";;".$fila['teacher'].";;".$fila['description'].";;".$fila['total'];
	exit();
}

if (isset($_POST['borrar_electivas'])){

	mysqli_query($con,"DELETE FROM electivecourse WHERE id='$_POST[id_elect]' ");
	echo "ok";

	exit();
}

if (isset($_POST['buscar_estudiantes_materia'])){
	$query = "SELECT * FROM users_x_electivecourse Where elective_course ='$_POST[id_elect]'";
	$sql1= mysqli_query($con,$query);
	while($fila1=mysqli_fetch_array($sql1)){
		$query2 = "SELECT * FROM users Where id ='$fila1[user]'";
		$fila2=mysqli_fetch_array(mysqli_query($con,$query2));
		echo '<li class="list-group-item">'.$fila2['firstname'].' '.$fila2['lastname'].' - '.$fila2['code'].' <br></li>';
	}
	exit();
}


////////////////////////////////////////////////////// METODOS ESTUDIANTES //////////////////////////////////
////////////////////////////////////////////////////// METODOS ESTUDIANTES //////////////////////////////////
////////////////////////////////////////////////////// METODOS ESTUDIANTES //////////////////////////////////
////////////////////////////////////////////////////// METODOS ESTUDIANTES //////////////////////////////////
////////////////////////////////////////////////////// METODOS ESTUDIANTES //////////////////////////////////
if (isset($_POST['buscar_estudiante'])){
	$query = "SELECT * FROM users Where (username LIKE ('%$_POST[valor]%') OR firstname LIKE ('%$_POST[valor]%') OR lastname LIKE ('%$_POST[valor]%'))";
	
	$sql1= mysqli_query($con,$query);
	while($fila1=mysqli_fetch_array($sql1)){
		echo '<li class="list-group-item">
					<div class="col-xs-6"><b>'.$fila1['firstname'].' '.$fila1['lastname'] .'</b>
					<br>'.$fila1['username'].'<br>Código: '.$fila1['code'].'</div>
					<div class="col-xs-6">
						<a idmateriasest="'.$fila1['id'].'"class="btn btn-success btn-xs materiasest" href="#?idmateriasest="'.$fila1['id'].'"> Electivas </a>';
		if($_SESSION['admin'] == '1'){
		echo '			<a ideditarest="'.$fila1['id'].'"class="btn btn-info btn-xs editarest" href="#?ideditarest="'.$fila1['id'].'"> Editar </a>';
		echo '			<a idborrarest="'.$fila1['id'].'"class="btn btn-danger btn-xs borrarest" href="#?idborrarest="'.$fila1['id'].'"> Borrar </a>';
		}
		echo '		</div><br><br> <br> 
			  </li>';
	}
	exit();
}

if (isset($_POST['buscar_materias_estudiante'])){
	$query = "SELECT * FROM users_x_electivecourse Where user ='$_POST[id_est]'";
	$sql1= mysqli_query($con,$query);
	while($fila1=mysqli_fetch_array($sql1)){
		$query2 = "SELECT * FROM electivecourse Where id ='$fila1[elective_course]'";
		$fila2=mysqli_fetch_array(mysqli_query($con,$query2));
		echo '<li class="list-group-item">'.$fila2['name'].' <br></li>';
	}
	exit();
}

if (isset($_POST['nuevo_estudiante'])){

	if ($_POST['id_est'] == ''){
		$fila=mysqli_fetch_array(mysqli_query($con,"SELECT username FROM users Where username='$_POST[user]' or code='$_POST[code]'"));
		if (!$fila['username']){
		// $contra=md5($_POST['pass']);
		$contra=($_POST['pass']);
		$admin = 0;
		mysqli_query($con,"INSERT INTO users (firstname ,lastname,username,password,admin,code) 
			VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[user]','$contra','$admin','$_POST[code]')");
			echo "ok";
		}else{
			echo "ya";
		}
	}else{
		// $contra=md5($_POST['pass']);
		$contra=($_POST['pass']);
		mysqli_query($con,"UPDATE users SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',username='$_POST[user]',code='$_POST[code]',password='$contra'  WHERE id='$_POST[id_est]' ");
		echo "ok";
	}
	exit();
}

if (isset($_POST['datos_estudiante'])){
	$fila=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users Where id='$_POST[id_est]'"));
	echo $fila['firstname'].";;".$fila['lastname'].";;".$fila['username'].";;".$fila['code'];

	exit();
}

if (isset($_POST['borrar_estudiante'])){

	mysqli_query($con,"DELETE FROM users WHERE id='$_POST[id_est]' ");
	echo "ok";

	exit();
}

?>