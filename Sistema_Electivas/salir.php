<?php
session_start();
/*
este codigo cierra sesión, elimina las variables de sesión
*/
include 'conexion/conexion_db.php';
date_default_timezone_set('America/Bogota');


$_SESSION = array();
unset($_SESSION);

session_destroy();//destruir sesión
?>

<script type="text/javascript">
	window.location="index.php";// ir al inicio
</script>
