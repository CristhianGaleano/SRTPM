<?php session_start();?>
<?php
	require_once "procesar/Conexion.php";
	require_once "config/config.php";
	require_once "procesar/operaciones.php";
	$con = getConexion($bd_config);
	$usuario=$_POST['user'];
	$pass=$_POST['pass'];
	$result = buscarUserBD($usuario,$pass,$con);
	if($result !== false){
if($pass == $result['password']){
$_SESSION['nombreUser'] = $result['username'];
header("Location: principal.php?a=$usuario");
echo "Entro";
			exit;
		}
	}
?>