<?php
	include('cabecera.php');
	session_start();

if (!$_SESSION) {
	header('location:index.php');
}
?>



<table border="0" id="tabla_permiso_parillero">
	<form action="procesar/permiso_parrillero.php" method="post" enctype="multipart/form-data">

<td><h2>Datos propietario</h2></tr></td>
<tr>
	<td><input type="text" name="cc" placeholder="Docuemnto"></td>
	<td><input type="text" name="nombres" placeholder="Nombres"></td>
</tr>

<tr>
	<td><input type="text" name="apellidos" placeholder="Apellidos"></td>
	<td><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento"></td>
</tr>
	
<tr>
	<td><input type="text" name="direccion" placeholder="Direccion"></td>
	<td><input type="text" name="email" placeholder="E-mail"></td>
</tr>
	
<tr>
	<td><input type="text" name="celular" placeholder="Celular"></td>
	
</tr>
	

<tr>
	<td><input type="file" name="cedula" value="Cedula"></td>
	<td><input type="file" name="foto" value="Foto"></td>
	
</tr>
	
<tr>
	<td><input type="file" name="tarjetaP" value="Tarjeta de propiedad"></td>
	<td><input type="file" name="certificadoV" value="Certificado de vecindad"></td>
	
</tr>
	
<tr>
	<td><input type="file" name="licenciaC" value="Licencia de conduccion"></td>
	<td><input type="file" name="soat" value="SOAT"></td>
</tr>
	
<tr>
	<td><input type="file" name="registroC" value="Registro Civil"></td>
	<td><input type="file" name="seguro" value="Seguro"></td>
</tr>

	
<tr>
	<td><input type="file" name="passalvo" value="Paz y Salvo"></td>
	<td><input type="file" name="pasadoJ" value="Pasado Judicial"></td>
</tr>
	
<!--FORMULARIO PARRILLERO-->
<tr>
<td><h2>Datos Parrillero</h2></tr></td>
<tr>
	<td><input type="text" name="documento_parrillero" placeholder="Documento" ></td>
	<td><input type="text" name="nombres_parrillero" placeholder="Nombres"></td>
</tr>

<tr>
	<td><input type="text" name="apellidos_parrillero" placeholder="Apellidos"></td>
	<td><input type="text" name="edad_parrillero" placeholder="Edad"></td>
</tr>

<tr>
	<td><input type="date" name="fecha_naci_parrillero" placeholder="Fecha Nacimiento"></td>
	<td><input type="file" name="pasado_judicial_parrillero"></td>
</tr>

<tr>
	<td><input type="file" name="documento_identida_parrillero"></td>
	<td><input type="file" name="registro_civil_parrillero"></td>
</tr>

<tr><td></td></tr>

<tr>
	<td>
	<input type="submit" value="Upload">
	</td>
</tr>
	
</table>
</form>

<?php
	include('piedepagina.php');
?>