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
	$sql = "SELECT * FROM usuarios WHERE username=:usuario AND password=:password";
	$statement = $con->prepare($sql);
	$statement->execute(
		array(
			':usuario' => $user,
			':password' => $pass 
		));
	$result= $statement->fetch();
	return $result;
}


function buscarSolicitudesHE($con)
{
	$sql = 'SELECT  propietario_moto.cedula_propietario,nombre_propietario, apellidos,fecha_solicitud,propietario_moto.direccion,propietario_moto.telefono,email,estado FROM propietario_moto, permiso_horario_extendido, empresa where propietario_moto.cedula_propietario = permiso_horario_extendido.cedula_propietario and empresa.nit = permiso_horario_extendido.nit';
	$statement = $con->prepare($sql);
	$statement->execute();
	$result= $statement->fetchAll();
	return $result;
}

function registrarPM($cc,$nombres,$apellidos,$fecha_nacimiento,$direccion,$email,$telefono,$cedula,$tarjetaP,$certificadoV,$licenciaC,$soat,$registroC,$seguro,$passalvo,$pasadoJ,$foto,$con)
{
	$sql = "INSERT INTO propietario_moto(
	            cedula_propietario, nombre_propietario,apellidos, fecha_naci_propietario,direccion, email, telefono,cedula_escaneada_propietario, tarjeta_propieda, 
	            certificado_vecinda, licensia_conduccion, soat, registro_civil, 
	            seguro, passalvo_transito, pasado_judicial, foto)
	    VALUES ('".$cc."','".$nombres."','".$apellidos."','".$fecha_nacimiento."','".$direccion."','".$email."','".$telefono."', '".$cedula."','".$tarjetaP."','".$certificadoV."','".$licenciaC."','".$soat."','".$registroC."','".$seguro."','".$passalvo."','".$pasadoJ."','".$foto."')";

	$statement = $con->prepare($sql);
	$statement->execute();
	return $statement;	
}

function registrarE($nit,$carta,$con)
{
	$sql = "INSERT INTO empresa(nit,carta) VALUES ('".$nit."','".$carta."')";
	$statement = $con->prepare($sql);
	$statement->execute();
	return $statement;
}

function registrarPHE($cc,$nit,$con)
{
	$sql = "INSERT INTO permiso_horario_extendido (fecha_solicitud,estado,cedula_propietario,nit) VALUES (CURRENT_DATE,'INICIADO','".$cc."','".$nit."')";
	     
	$statement = $con->prepare($sql);
	$statement->execute();
	return $statement;
}
	
 ?>

