<?php 
session_start();
require('cabecera.php');
require('connect_bd.php');
if (!$_SESSION) {//si no existe nada en la matriz asociativa deuelva a la pagina de logueo
	header("location:index.html");
}
 ?>

<?php 
/*mediante la matriz asociativa $_GET que es superglobal obtenemos el valor enviado*/



//traemos todos los datos relacionados con este identificador de propietario, para mostrarlos al admin
$id = $_GET['id'];

$sql = "SELECT * FROM propietario_moto, permiso_horario_extendido, empresa WHERE propietario_moto.cedula_propietario = permiso_horario_extendido.cedula_propietario and empresa.nit = permiso_horario_extendido.nit and propietario_moto.cedula_propietario='".$id."'";

//ejecutamos la consulta
$result = pg_query($sql);
$row = pg_fetch_array($result);

//creamos varaibles de session para pasarlas al archivo cambiar estado
$email = $row['email'];
$_SESSION["id"] = $id;

 ?>


<div class="envoltura-areaPP">

	<div class="envoltura-datos-parri  datos-area-propietario">	
	<center><h2>DATOS PROPIETARIO</h2></center>
		DOCUMENTO: <?php echo $row['cedula_propietario']; ?>&nbsp;
		NOMBRES: <?php echo $row['nombre_propietario']; ?>&nbsp;
		APELLIDOS: <?php echo $row['apellidos']; ?>&nbsp;
		FECHA NACIMIENTO: <?php echo $row['fecha_naci_propietario']; ?></p>
		DIRECCION: <?php echo $row['direccion']; ?>&nbsp;
		E-MAIL: <?php echo $row['email']; ?>&nbsp;
		TELEFONO: <?php echo $row['telefono']; ?>&nbsp;
		ESTADO SOLICITUD: <?php echo $row['estado']; ?>&nbsp;		
	</div>
<div class="envoltura-datos-parri datos-area-archivos-propietario">
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=cedula_escaneada_propietario" target="_blank" >Cedula</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=foto" target="_blank" >Foto</a></td>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=tarjeta_propieda" target="_blank" >Tarjeta propiedad</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=certificado_vecinda" target="_blank" >Certificado vecindad</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=licensia_conduccion" target="_blank" >Licencia de conduccion</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=soat" target="_blank" >Soat</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=registro_civil" target="_blank" >Registro civil</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=seguro" target="_blank" >Seguro</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=passalvo_transito" target="_blank" >Pas y salvo transito</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=pasado_judicial" target="_blank" >Pasado judicial</a>&nbsp;
</div>

<div class="envoltura-datos-parri datos-area-parrillero">
	<!--datos parrillero
		verificar si se necesita la variable 'llaves'
		-->
		<center><h2>Datos empresa</h2></center>
		NIT: <?php echo $row['nit']; ?>
		<a href="archivo.php?cc=<?php echo $row['cedula_parrillero'];?>&llaves=cedula_parrillero&nombreT=parrillero&nombreC=carta" target="_blank" >Carta</a></p>
</div>

<div class="envoltura-datos-parri datos-area-permiso-parrillero">
		<!--Datos permiso-->
		<center><h2>DATOS PERMISO</h2></center>
		NUMERO REGISTRO SOLICITUD: <?php echo $row['id']; ?>
		FECHA DE EXPEDICION: <?php echo $row['fecha_expedicion']; ?>
		FECHA VENCIMIENTO PERMISO: <?php echo $row['fecha_vencimiento']; ?>
		ESTADO SOLICITUD: <?php echo $row['estado']; ?>
</div>

<div class="envoltura-datos-parri area-formulario-pP">
		<h2>CAMBIAR ESTADO</h2>

		<form action="cambiar_estado_extendido.php" method="post">
      <br />
   <input type="radio" name="estado-solicitud" value="Aprobado" />
   <label for="css">Aprobado</label>
   <br />
   <input type="radio" name="estado-solicitud" value="Rechazado" />
   <label for="js">Rechazado</label>
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
	pg_close($link);
require('piedepagina.php');
  ?>