<?php 
	session_start();
	//si existe la variable de sesion nombre destruyala
	 if ($_SESSION['nombre_user']){
	 	session_destroy();//destruyala
	 	header("location: index.php");//redirigir
	 } else{
	 	header("location: index.php");
	 }

	 //cerramos la conexion
	
?>