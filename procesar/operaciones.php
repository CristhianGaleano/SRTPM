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



	
 ?>

