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


function encontrarArchivo($prefijo,$campo,$propietario,$con){
	$campo = $prefijo.".".$campo;
	$sql = "SELECT $campo FROM empresa,propietario_moto,permiso_horario_extendido WHERE propietario_moto.cedula_propietario=permiso_horario_extendido.cedula_propietario AND permiso_horario_extendido.nit=empresa.nit AND propietario_moto.cedula_propietario=$propietario";
	$stm = $con->prepare($sql);
	$stm->execute();
	#var_dump($stm);
	$result = $stm->fetch();
return $result;

}

function encontrarArchivoPP($prefijo,$campo,$propietario,$con){
	$campo = $prefijo.".".$campo;
	$sql = "SELECT $campo FROM parrillero,propietario_moto,permiso_parrillero WHERE propietario_moto.cedula_propietario=permiso_parrillero.propietario_moto_cedula_propietario AND permiso_parrillero.parrillero_cedula_parrillero=parrillero.cedula_parrillero AND propietario_moto.cedula_propietario=$propietario LIMIT 1";
	$stm = $con->prepare($sql);
	$stm->execute();
	#var_dump($stm);
	$result = $stm->fetch();
	#var_dump($result);
return $result;

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
	$sql = "SELECT permiso_horario_extendido.fecha_solicitud, permiso_horario_extendido.estado, propietario_moto.cedula_propietario, propietario_moto.nombre_propietario, propietario_moto.apellidos,propietario_moto.email,propietario_moto.telefono AS propietarioTelefono,empresa.nit,empresa.nit,empresa.nombre AS nombreEmpresa,empresa.telefono FROM permiso_horario_extendido INNER JOIN propietario_moto on permiso_horario_extendido.cedula_propietario = propietario_moto.cedula_propietario INNER JOIN empresa ON  permiso_horario_extendido.nit=empresa.nit";
	$statement = $con->prepare($sql);
	$statement->execute();
	$result= $statement->fetchAll();
	#var_dump($result);
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
	$statement = $statement->execute();
	return $statement;	
}



function registrarE($nit,$carta,$con)
{
	$sql = "INSERT INTO empresa(nit,carta) VALUES (:nit,:carta)";
	$statement = $con->prepare($sql);
	$statement -> bindParam(':nit',$nit);
	$statement -> bindParam(':carta',$carta);
	$statement->execute();
	return $statement;
}

function registrarSPHE($cc,$nit,$con)
{
	$estado = "Activo";
	$fecha_sistema = Date("Y-m-d");
	$sql = "INSERT INTO permiso_horario_extendido (id,fecha_solicitud,fecha_expedicion,estado,cedula_propietario,nit) 
	VALUES
		 (null,:fecha_solicitud,:fecha_expedicion,:estado,:cedula,:nit)";
	     
	$statement = $con->prepare($sql);
	$statement->bindParam(':fecha_solicitud',$fecha_sistema);
	$statement->bindParam(':fecha_expedicion',$fecha_sistema);
	$statement->bindParam(':estado',$estado);
	$statement->bindParam(':cedula',$cc);
	$statement->bindParam(':nit',$nit);
	$statement->execute();
	return $statement;
}

function registrarP($cc,$nit,$con)
{
	$sql = "INSERT INTO permiso_horario_extendido (fecha_solicitud,estado,cedula_propietario,nit) VALUES (CURRENT_DATE,'INICIADO','".$cc."','".$nit."')";
	     
	$statement = $con->prepare($sql);
	$statement->execute();
	return $statement;
}

function registrarParrillero($documento_parrillero,$nombres_parrillero,$apellidos_parrillero,$edad_parrillero,$fecha_naci_parrillero,$pasado_judicial_parrillero,$documento_identida_parrillero,$registro_civil_parrillero,$con)
{
	$sql = "INSERT INTO parrillero(
            cedula_parrillero, nombres_parrillero, apellidos_parillero, edad, 
            fecha_naci, pasado_judicial, cedula_scanner, registro_civil) 
            VALUES('".$documento_parrillero."','".$nombres_parrillero."','".$apellidos_parrillero."','".$edad_parrillero."','".$fecha_naci_parrillero."','".$pasado_judicial_parrillero."','".$documento_identida_parrillero."','".$registro_civil_parrillero."')";

    $statement = $con->prepare($sql);
	$statement = $statement->execute();
	return $statement;
}

function registrarPermisoParrillero($cc,$documento_parrillero,$con)
{
	$fecha_solicitud = Date("Y-m-d");
	$estado = "Activo";
	$sql = "INSERT INTO permiso_parrillero (id,fecha_solicitud,estado,propietario_moto_cedula_propietario,parrillero_cedula_parrillero) VALUES (null,:fecha_solicitud,:estado,:propietario_moto_cedula_propietario,:parrillero_cedula_parrillero)";

	$statement = $con->prepare($sql);
	$statement->bindParam(':fecha_solicitud',$fecha_solicitud);
	$statement->bindParam(':estado',$estado);
	$statement->bindParam(':propietario_moto_cedula_propietario',$cc);
	$statement->bindParam(':parrillero_cedula_parrillero',$documento_parrillero);
	$statement = $statement->execute();
	return $statement;


}
	
 ?>

