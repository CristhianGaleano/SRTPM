<?php 


function convertirFecha($fecha){
if ($fecha == "") {
	$fecha = "";
}else{
	$string = explode("/", $fecha);

	$mes =  $string[0];
	$dia =  $string[1];
	$anio = $string[2];

	return $anio . "-" . $mes . "-" . $dia;
}
}


function encontrarArchivo($id){
	$sql = "SELECT * FROM propietario_moto WHERE cedula_propietario = '".$id."'";
$result = pg_query($sql);

$datos = pg_fetch_array($result);
 
return $datos;

}

function buscarUserBD($user,$pass,$con)
{
	#echo "$usuario $pass";
	$sql = "SELECT * FROM usuarios WHERE username=:usuario AND password=:password";
	$statement = $con->prepare($sql);
	#var_dump($statement);
	$statement->execute(
		array(
			':usuario' => $user,
			':password' => $pass 
		));
	$result= $statement->fetch();
	#var_dump($result);
	return $result;
}


function buscarSolicitudesHE($con)
{
	$sql = 'SELECT  propietario_moto.cedula_propietario,nombre_propietario, apellidos,fecha_solicitud,propietario_moto.direccion,propietario_moto.telefono,email,estado FROM propietario_moto, permiso_horario_extendido, empresa where propietario_moto.cedula_propietario = permiso_horario_extendido.cedula_propietario and empresa.nit = permiso_horario_extendido.nit';
	$statement = $con->prepare($sql);
	#var_dump($statement);
	$statement->execute();
	$result= $statement->fetchAll();
	#var_dump($result);
	return $result;

}
	
 ?>

