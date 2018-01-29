<?php 
session_start();
require_once 'cabecera.php';
require_once 'config/config.php';
require_once 'procesar/Conexion.php';
if (!$_SESSION) {//si no existe nada en la matriz asociativa deuelva a la pagina de logueo
	header("location:index.html");
}

$con = getConexion($bd_config);
 ?>

<?php 
/*mediante la matriz asociativa $_GET que es superglobal obtenemos el valor enviado*/
//traemos todos los datos relacionados con este identificador de propietario, para mostrarlos al admin
$cedula = $_GET['id'];

$sql = "SELECT permiso_horario_extendido.id,permiso_horario_extendido.fecha_solicitud, permiso_horario_extendido.fecha_expedicion,permiso_horario_extendido.fecha_vencimiento, permiso_horario_extendido.estado, propietario_moto.cedula_propietario, propietario_moto.nombre_propietario, propietario_moto.apellidos,propietario_moto.email,propietario_moto.telefono AS propietarioTelefono,propietario_moto.fecha_naci_propietario,propietario_moto.direccion, propietario_moto.foto,propietario_moto.tarjeta_propieda,empresa.nit,empresa.carta,empresa.nombre AS nombreEmpresa,empresa.telefono FROM permiso_horario_extendido INNER JOIN propietario_moto on permiso_horario_extendido.cedula_propietario = propietario_moto.cedula_propietario INNER JOIN empresa ON  permiso_horario_extendido.nit=empresa.nit WHERE propietario_moto.cedula_propietario = $cedula";

//ejecutamos la consulta
$stm = $con->prepare($sql);
$stm->execute();
$row = $stm->fetch();

#var_dump($row);

//creamos varaibles de session para pasarlas al archivo cambiar estado
$_SESSION["email"] = $row['email'];
$_SESSION["documento"] = $cedula;

 ?>


<div class="envoltura-areaPP">

	<div class="envoltura-datos-parri  datos-area-propietario">	
	<center><h2>DATOS PROPIETARIO</h2></center><br>
		<strong>DOCUMENTO:</strong> <?php echo $row['cedula_propietario']; ?>&nbsp;
		<strong>NOMBRES:</strong> <?php echo $row['nombre_propietario']; ?>&nbsp;
		<strong>APELLIDOS:</strong> <?php echo $row['apellidos']; ?>&nbsp;
		<strong>FECHA NACIMIENTO:</strong> <?php echo $row['fecha_naci_propietario']; ?></p>
		<strong>DIRECCION:</strong> <?php echo $row['direccion']; ?>&nbsp;
		<strong>E-MAIL:</strong> <?php echo $row['email']; ?>&nbsp;
		<strong>TELEFONO:</strong> <?php echo $row['telefono']; ?>&nbsp;
		<strong>ESTADO SOLICITUD:</strong> <?php echo $row['estado']; ?>&nbsp;		
	</div>
<div class="envoltura-datos-parri datos-area-archivos-propietario">

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=cedula_escaneada_propietario" target="_blank" >Cedula</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=foto&nombreT=propietario_moto&nombreC=foto" target="_blank" >Foto</a></td>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=tarjeta_propieda&nombreT=propietario_moto&nombreC=tarjeta_propieda" target="_blank" >Tarjeta propiedad</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=certificado_vecinda" target="_blank" >Certificado vecindad</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=licensia_conduccion" target="_blank" >Licencia de conduccion</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=soat" target="_blank" >Soat</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=registro_civil" target="_blank" >Registro civil</a>&nbsp;
		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=seguro" target="_blank" >Seguro</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=passalvo_transito" target="_blank" >Pas y salvo transito</a>&nbsp;

		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=pasado_judicial" target="_blank" >Pasado judicial</a>&nbsp;

</div>

<div class="envoltura-datos-parri datos-area-parrillero">
	<!--datos parrillero
		verificar si se necesita la variable 'llaves'
		-->
		<center><h2>Datos empresa</h2></center>
		NIT: <?php echo $row['nit']; ?>
		<a href="archivo.php?propietario=<?php echo $row['cedula_propietario'];?>&llaves=carta&nombreT=empresa&nombreC=carta" target="_blank" >Carta</a></p>
</div>

<div class="envoltura-datos-parri datos-area-permiso-parrillero">
		<!--Datos permiso-->
		<center><h2>DATOS PERMISO</h2></center>
		<strong>NUMERO REGISTRO SOLICITUD:</strong> <?php echo $row['id']; ?>
		<strong>FECHA DE EXPEDICION:</strong> <?php echo $row['fecha_expedicion']; ?>
		<strong>FECHA VENCIMIENTO PERMISO:</strong> <?php echo $row['fecha_vencimiento']; ?>
		<strong>ESTADO SOLICITUD:</strong> <?php echo $row['estado']; ?>
</div>

<div class="envoltura-datos-parri area-formulario-pP">
		<h2>CAMBIAR ESTADO</h2>

	<form action="cambiar_estado_extendido.php" method="post">
      <br />
   <input type="radio" name="estado_solicitud" value="Aprobado" />
   <label for="Aprobado">Aprobado</label>
   <br />
   <input type="radio" name="estado_solicitud" value="Rechazado" />
   <label for="Rechazado">Rechazado</label>
   	</p>Fechas de expedicion:
   <input	type="text" name="fecha_expedicion" />
   </p>Fechas de vencimiento:
   <input	type="text" name="fecha_vencimiento" />
   	</p>

	<textarea rows="4" cols="50">NOTA</textarea><br> 
    <input type="submit" name="cambiar" value="cambiar">
</form>
</div> 
	</div>
	



 <?php 


/*

Aqui una funcionan para enviar correo

<?php
$mail = "Prueba de mensaje";
//Titulo
$titulo = "PRUEBA DE TITULO";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Geeky Theory < tu_dirección_email >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail("tu_dirección_email",$titulo,$mail,$headers);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}
?>
*/
//cerramos la conexion
	closeConexion($con);
require('piedepagina.php');
  ?>