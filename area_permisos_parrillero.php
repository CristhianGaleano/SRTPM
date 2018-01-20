<?php 
session_start();
require('cabecera.php');
require('connect_bd.php');

if(!$_SESSION) {
	header('location:index.html');
}
 ?>

<?php 
/*mediante la matriz asociativa $_GET que es superglobal obtenemos el valor enviado*/



//traemos todos los datos relacionados con este identificador de propietario, para mostrarlos al admin
$id = $_GET['id'];

$sql = "SELECT * FROM propietario_moto, permiso_parrillero, parrillero WHERE propietario_moto.cedula_propietario = parrillero.cedula_propietario and propietario_moto.cedula_propietario = permiso_parrillero.cedula_propietario and propietario_moto.cedula_propietario='".$id."'";

//ejecutamos la consulta
$result = pg_query($sql);

$row = pg_fetch_array($result);
$email = $row['email'];

$_SESSION["id"] = $id;
$_SESSION["email"] = $email;

 ?>



	
<div class="envoltura-areaPP">
	<div class="envoltura-datos-parri  datos-area-propietario">	
	<center><h2>DATOS PROPIETARIO</h2></center>
		DOCUMENTO: <?php echo $row['cedula_propietario']; ?>&nbsp;
		NOMBRES: <?php echo $row['nombre_propietario']; ?>&nbsp;
		APELLIDOS: <?php echo $row['apellidos']; ?><br/>
		FECHA DE NACIMIENTO: <?php echo $row['fecha_naci_propietario']; ?>&nbsp;
		DIRECCION: <?php echo $row['direccion']; ?>&nbsp;
		E-MAIL: <?php echo $row['email']; ?><br/>
		TELEFONO: <?php echo $row['telefono']; ?>&nbsp;
		ESTADO DE LA SOLICITUD: <?php echo $row['estado']; ?>&nbsp;	
	</div>

	<div class="envoltura-datos-parri datos-area-archivos-propietario">
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=cedula_escaneada_propietario" target="_blank" >Cedula</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=foto" target="_blank" >Foto</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=tarjeta_propieda" target="_blank" >Tarjeta propiedad</a><br/>
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=certificado_vecinda" target="_blank" >Certificado vecindad</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=licensia_conduccion" target="_blank" >Licencia de conduccion</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=soat" target="_blank" >Soat</a><br/>
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=registro_civil" target="_blank" >Registro civil</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=seguro" target="_blank" >Seguro</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=passalvo_transito" target="_blank" >Pas y salvo transito</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_propietario'];?>&llaves=cedula_propietario&nombreT=propietario_moto&nombreC=pasado_judicial" target="_blank" >Pasado judicial</a>&nbsp;
	</div>

	<div class="envoltura-datos-parri datos-area-parrillero">
		<!--datos parrillero
		verificar si se necesita la variable 'llaves'
		-->
		<center><h2>DATOS PARRILLERO</h2></center>
		DOCUMENTO: <?php echo $row['cedula_parrillero']; ?>&nbsp;
		NOMBRES: <?php echo $row['nombres_parrillero']; ?>&nbsp;
		APELIDOS: <?php echo $row['apellidos_parillero']; ?><br/>
		EDAD: <?php echo $row['edad']; ?>&nbsp;
		FECHA EXPEDICION: <?php echo $row['fecha_naci']; ?><br/>
		<a href="archivo.php?cc=<?php echo $row['cedula_parrillero'];?>&llaves=cedula_parrillero&nombreT=parrillero&nombreC=pasado_judicial" target="_blank" >Pasado judicial</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_parrillero'];?>&llaves=cedula_parrillero&nombreT=parrillero&nombreC=cedula_scanner" target="_blank" >Cedula</a>&nbsp;
		<a href="archivo.php?cc=<?php echo $row['cedula_parrillero'];?>&llaves=cedula_parrillero&nombreT=parrillero&nombreC=registro_civil" target="_blank" >Registro civil</a>&nbsp;
	</div>

	<div class="envoltura-datos-parri datos-area-permiso-parrillero">
		<!--Datos permiso-->
		<center><h2>DATOS PERMISO</h2></center>
		NUMERO REGISTRO SOLICITUD: <?php echo $row['id']; ?>&nbsp;
		FECHA EXPEDICION: <?php echo $row['fecha_expedicion']; ?><br/>
		FECHA VENCIMIENTO SOLICITUD : <?php echo $row['fecha_vencimiento']; ?>&nbsp;
		ESTADO SOLICITUD: <?php echo $row['estado']; ?>&nbsp;
	</div>



<div class="envoltura-datos-parri area-formulario-pP">
		<h2>CAMBIAR ESTADO SOLCITUD</h2>

		<form action="cambiar_estado.php" method="post">
      <br />
   <input type="radio" name="estado-solicitud" value="Aprobado" />
   <label for="css">Aprobado</label>
   <input type="radio" name="estado-solicitud" value="Rechazado" />
   <label for="css">Rechazado</label><br>
   	<br>Fecha de expedicion:&nbsp;<input	type="text" name="fecha_expedicion"/>
   <br>Fecha de vencimiento:&nbsp;<input	type="text" name="fecha_vencimiento"/>
   	</p>


   	 <textarea rows="4" cols="50">NOTA</textarea><br> 

   <input type="submit" name="cambiar" value="cambiar">

	</form> 
	</div>

</div>



 <?php 
 //cerramos la conexion
	pg_close($link);
require('piedepagina.php');
  ?>