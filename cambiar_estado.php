<?php 
session_start();
require('connect_bd.php');

if (isset($_POST['cambiar'])) {
	$fecha_expedicion = $_POST['fecha_expedicion'];
	$fecha_vencimiento = $_POST['fecha_vencimiento'];
	$estado_solicitud = $_POST['estado-solicitud'];
	//$cedula_propietario = $row['cedula_propietario'];

//guardamos las variables de session enviadas desde el archivo area de permisos extendidos
$cedula_propietario = $_SESSION["id"];
$email_propietario = $_SESSION["email"];

	$sqlUpdate = "UPDATE permiso_parrillero SET fecha_expedicion='$fecha_expedicion', fecha_vencimiento='$fecha_vencimiento', estado='$estado_solicitud' WHERE cedula_propietario='$cedula_propietario'"; 
		$result = pg_query($sqlUpdate);

		echo "<script>alert('INSERCION EXITOSA')</script>";

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



	header('location: solicitud_parrillero.php');
}




 ?>