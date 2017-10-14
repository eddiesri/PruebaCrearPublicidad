<?php 

include '../conexion/conexion_db.php';

date_default_timezone_set('America/Bogota');



//Registrar un nuevo negocio

if (isset($_POST['registrar'])){
	$fila=mysqli_fetch_array(mysqli_query($con,"SELECT username FROM users Where username='$_POST[user]'"));
	if (!$fila['username']){
	$contra=md5($_POST['pass']);
	mysqli_query($con,"INSERT INTO users (firstname ,lastname,username,password,admin) 
		VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[user]','$contra','0')");
	}else{
		echo "ya";
	}
	exit();
}
?>