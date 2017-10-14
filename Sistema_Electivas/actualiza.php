<?php
session_start();
include 'conexion/conexion_db.php';
date_default_timezone_set('America/Bogota');


//---------------------------------------------------buscar e iniciar sesion--------------------------------------------------
if (isset($_POST['buscar'])){
	


	$contra1=$_POST['pasd'];
	$sql0 = mysqli_query($con,"SELECT * FROM  users WHERE code='$_POST[user]' AND password='$contra1'");
	$i=0;
	while($fila0=mysqli_fetch_array($sql0)){
		$i++;
	}


	if ($i == 0) {// si no se encuentra la persona registrada
		echo "0"; 
	}else{
		$fila0=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM  users WHERE code='$_POST[user]' AND password='$contra1'"));
		$_SESSION['code']=$fila0['code'];
		$_SESSION['username']=$fila0['username'];
		$_SESSION['password']=$fila0['password'];
		$_SESSION['firstname']=$fila0['firstname'];
		$_SESSION['lastname']=$fila0['lastname'];
		$_SESSION['admin']=$fila0['admin'];	
		$_SESSION['id']=$fila0['id'];	
		echo "1";	  // puede continuar
	}
	exit();	
}



?>