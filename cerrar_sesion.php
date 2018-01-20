<?php 
	session_start();
	//si existe la variable de sesion nombre destruyala
	 if ($_SESSION['nombre_user']){
	 	session_destroy();//destruyala
	 	header("location: index.html");//redirigir
	 } else{
	 	header("location: index.html");
	 }

	 //cerramos la conexion
	pg_close($link);
?>