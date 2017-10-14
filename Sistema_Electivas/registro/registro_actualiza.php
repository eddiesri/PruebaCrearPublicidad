<?php 

include '../conexion/conexion_db.php';

date_default_timezone_set('America/Bogota');



//Registrar un nuevo usuario

if (isset($_POST['registrar'])){
	$fila=mysqli_fetch_array(mysqli_query($con,"SELECT username FROM users Where username='$_POST[user]' or code='$_POST[code]'"));
	if (!$fila['username']){
	$contra=$_POST['pass'];
	mysqli_query($con,"INSERT INTO users (firstname ,lastname,username,password,admin,code) 
		VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[user]','$contra','0','$_POST[code]')");
	}else{
		echo "ya";
	}
	exit();
}
?>