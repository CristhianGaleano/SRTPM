<?php 
session_start();
require_once 'config/config.php';
require_once 'procesar/Conexion.php';

$con=getConexion($bd_config);

if (isset($_POST['cambiar'])) {
	var_dump($_POST);
	$fecha_expedicion = $_POST['fecha_expedicion'];
	$fecha_vencimiento = $_POST['fecha_vencimiento'];
	$estado_solicitud = $_POST['estado_solicitud'];
	//$cedula_propietario = $row['cedula_propietario'];

//guardamos las variables de session enviadas desde el archivo area de permisos extendidos
$cedula_propietario = $_SESSION["documento"];
$email_propietario = $_SESSION["email"];

	$sqlUpdate = "UPDATE permiso_horario_extendido SET fecha_expedicion='$fecha_expedicion', fecha_vencimiento='$fecha_vencimiento', estado='$estado_solicitud' WHERE cedula_propietario='$cedula_propietario'"; 
		$stm = $con->prepare($sqlUpdate);
		$stm->execute();

		if ($stm) {
		echo "<script>alert('INSERCION EXITOSA')</script>";
		}


$mail = $email_propietario;
//Titulo
$titulo = "estado solicitud permiso";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Geeky Theory < titiruizah@gmail.com >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail("titiruizah@hotmail.com",$titulo,$email_propietario,$headers);

if($bool){
    echo "<script>alert('MENSAJE ENVIADO ')</script>";
}else{
    echo "<script>alert('ERROR AL ENVIAR CORREO ')</script>";
}



	header('location: solicitud_H_extendido.php');
}




 ?>