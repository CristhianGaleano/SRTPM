<?php
session_start();
	// conexion de base de datos
	require("procesar/Conexion.php");
	require("config/config.php");
	require("procesar/operaciones.php");

	$con = getConexion($bd_config);

#echo "entro";
	// obtiene variable de usuario y contraseña
	$usuario=$_POST['user'];
	$pass=$_POST['pass'];


	$result = buscarUserBD($usuario,$pass,$con);

	#si es diferente de false, encontro coincidencia
	if($result!=false){

		// si es la condicion es igual la contraseñas entonces entra la pagina
		if($pass==$result['password']){
			$_SESSION['nombre_user'] = $result['username'];
			header("Location:".URL."principal.php?a=$usuario");
		
		}
		// sino se devuelve
		else{

			echo '<script>alert("CONTRASEÑA INCORRECTA ")</script> ';
			echo "<script>location.href='index.html'</script>";
		}
	}
	// si no existe usuario se devuelve 
	else{
		
		echo '<script>alert("ESTA CUENTA NO EXISTE, POR FAVOR VERIFICA LA CONTRASEÑA O USUARIO PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.html'</script>";	

	}
?>