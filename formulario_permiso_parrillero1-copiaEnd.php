<?php
	
	include('connect_bd.php');
	require('procesar/operaciones.php');
	

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>SRTPM | Sistema de Registro y tramite Permisos Motociclistas</title>
	<meta name="description" content="Solicitu de permisos para parillero y horario extendido para motociclistasen la ciudad de pereira"/>
	<meta charset="utf-8">

    <link rel="shortcut icon" href="img/favicon.ico">

	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <!--<link rel="stylesheet" type="text/css" href="css/styleLetraAnimada.css">-->
    <link rel="stylesheet" type="text/css" href="css/styleTable.css" />
    <link rel="stylesheet" type="text/css" href="css/calendario.css">
    

	<script src="main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/calendario.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
        
     <script type="text/javascript">
     
             

             $(function(){
                $("#fecha_nacimiento").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });

                $("#fecha_naci_parrillero").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });


                

                
             })

      </script>

      

    
</head>

<body>



<?php 





$errores["file_cedula"] = "";
$errores["file_foto"] = "";
$errores["file_tarjetaP"] = "";
$errores["file_certificadoV"] = "";
$errores["file_licenciaC"] = "";
$errores["file_soat"] = "";
$errores["file_registroC"] = "";
$errores["file_seguro"] = "";
$errores["file_passalvo"] = "";
$errores["file_pasadoJ"] = "";

//datos dueño
//se crea un array
$errores["documento"] = "";
$errores["nombres"] = "";
$errores["apellidos"] = "";
$errores["fecha_nacimiento"] = "";
$errores["direccion"] = "";
$errores["email"] = "";
$errores["celular"] = "";
//datos parrillero

$errores["documento_parrillero"] = "";
$errores["nombres_parrillero"] = "";
$errores["apellidos_parrillero"] = "";
$errores["edad_parrillero"] = "";
$errores["fecha_naci_parrillero"] = "";
$errores["file_pasado_judicial_parrillero"] = "";
$errores["file_documento_identida_parrillero"] = "";
$errores["file_registro_civil_parrillero"] = "";

$error = false;
if (isset($_POST['upload']))//si existe la variable (nombre del boton para cargar datos)
{
	$cc = $_POST['cc'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$fecha_nacimiento = convertirFecha($fecha_nacimiento);
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telefono = $_POST['celular'];

	$documento_parrillero = $_POST['documento_parrillero'];
	$nombres_parrillero = $_POST['nombres_parrillero'];
	$apellidos_parrillero = $_POST['apellidos_parrillero'];
	$edad_parrillero = $_POST['edad_parrillero'];
	$fecha_naci_parrillero = $_POST['fecha_naci_parrillero'];
	$fecha_naci_parrillero = convertirFecha($fecha_naci_parrillero);
	
//-----VALIDACIONES--------
	//cc
	if (empty($cc) || (!is_numeric($cc))){
         $errores["documento"] = "¡Se requiere un Docuemnto Válido!";//
         $error = true;
    }
    else
    	$errores["documento"] = "";
    //nombres
	if (empty($nombres)){//
         $errores["nombres"] = "¡Los Nombres Son Requeridos!";
         $error = true;
    }
    else
    	$errores["nombres"] = "";
    //apellidos
	if (empty($apellidos)){//
         $errores["apellidos"] = "¡Los Apellidos Son Requeridos!";
         $error = true;
    }
    else
    	$errores["Apellidos"] = "";
    //fecha nacimiento
	if (empty($fecha_nacimiento)){//
         $errores["fecha_nacimiento"] = "¡La Fecha de Nacimiento es Requerida!";
         $error = true;
    }
    else
    	$errores["fecha_nacimiento"] = "";
    //direccion
	if (empty($direccion)){//
         $errores["direccion"] = "¡La Dirección es Requerida!";
         $error = true;
    }
    else
    	$errores["direccion"] = "";
    //email
	if (empty($email)){//
         $errores["email"] = "¡El E-mail es Requerido!";
         $error = true;
    }
    else
    	$errores["email"] = "";
    //celular
	if (empty($telefono) || (!is_numeric($telefono))){
         $errores["celular"] = "¡El Celular es Requerido, digite un numero de celular valido!";
         $error = true;
    }
    else
    	$errores["celular"] = "";
    //email
	if (empty($email)){//
         $errores["email"] = "¡El E-mail es Requerido!";
         $error = true;
    }
    else
    	$errores["email"] = "";

    //validación parillero
    //documento_parrillero
	if (empty($documento_parrillero) || (!is_numeric($documento_parrillero))){
         $errores["documento_parrillero"] = "¡Se requiere un Docuemnto Válido del Parrillero!";
         $error = true;
    }
    else
    	$errores["documento_parrillero"] = "";
    //nombres_parrillero
	if (empty($nombres_parrillero)){
         $errores["nombres_parrillero"] = "¡Los Nombres del Parrillero son Requeridos!";
         $error = true;
    }
    else
    	$errores["nombres_parrillero"] = "";
    //apellidos_parrillero
	if (empty($apellidos_parrillero)){
         $errores["apellidos_parrillero"] = "¡Los Apellidos del Parrillero son Requeridos!";
         $error = true;
    }
    else
    	$errores["apellidos_parrillero"] = "";
    //edad_parrillero
	if (empty($edad_parrillero) || (!is_numeric($edad_parrillero))){
         $errores["edad_parrillero"] = "¡La Edad del Parrillero es Requerida y debe ser en Numeros!";
         $error = true;
    }
    else{
    	if ($edad_parrillero < 14) {
    		$errores["edad_parrillero"] = "¡El Parrillero tiene menos de 14 años y no necesita el permiso!";
         	$error = true;
    	}
    	else
    		$errores["edad_parrillero"] = "";
    }
   	//fecha_naci_parrillero
	if (empty($fecha_naci_parrillero)){
         $errores["fecha_naci_parrillero"] = "¡La Fecha de Nacimiento del Parrillero es Requerida!";
         $error = true;
    }
    else
    	$errores["fecha_naci_parrillero"] = "";
}

// si el formulario ha sido enviado y los datos son correctos
// Procesar los datos falta procesar los archivos se debe hacer mediante java scrip
if (isset($_POST['upload']) && $error==false)
{
	/*
	$ruta = "upload/";//dar permiso de escritura para este directorio
       function validar_archivo($extension){
               $allowed = array('png', 'jpg', 'gif', 'pdf', 'doc', 'docx');
               if(!in_array(strtolower($extension), $allowed)){
               return "¡La extencion del archivo no es valida, solo permitimos 'png', 'jpg', 'gif', 'pdf', 'doc', 'docx'!";    
           }        
       }

       $extension = pathinfo($_FILES['cedula']['name'], PATHINFO_EXTENSION);
       $destino1 = $ruta.'/'.$_POST['cedula'].'/.cedula.'.$extension;
       $errores["file_cedula"]=validar_archivo($extension);
       if (isset($_FILES['cedula']) && $_FILES['cedula']['error'] == 0 && !empty($errores["file_cedula"]) && move_uploaded_file($_FILES['cedula']['tmp_name'], $destino1)) {
           echo "El Archivo es válido y se subió con éxito.\n";
           $cedula=$_FILES['cedula']['name'];
       } else {
           echo $errores["file_cedula"];
       }


       $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
       $destino2 = $ruta.'/'.$_POST['cedula'].'/.foto.'.$extension;
       $errores["file_foto"]=validar_archivo($extension);
       if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0 && !empty($errores["file_foto"]) && move_uploaded_file($_FILES['foto']['tmp_name'], $destino1)) {
           echo "El Archivo es válido y se subió con éxito.\n";
           $foto=$_FILES['foto']['name'];

       } else {
           echo $errores["file_cedula"];
       }
*/

      
	$ruta = "upload/";
	opendir($ruta);
	$destino1 = $ruta.$_FILES['cedula']['name'];
	copy($_FILES['cedula']['tmp_name'],$destino1);
	$cedula=$_FILES['cedula']['name'];

	$destino2 = $ruta.$_FILES['foto']['name'];
	copy($_FILES['foto']['tmp_name'],$destino2);
	$foto=$_FILES['foto']['name'];



	$destino3 = $ruta.$_FILES['tarjetaP']['name'];
	copy($_FILES['tarjetaP']['tmp_name'],$destino3);
	$tarjetaP=$_FILES['tarjetaP']['name'];

	$destino4 = $ruta.$_FILES['certificadoV']['name'];
	copy($_FILES['certificadoV']['tmp_name'],$destino4);
	$certificadoV=$_FILES['certificadoV']['name'];

	$destino5 = $ruta.$_FILES['licenciaC']['name'];
	copy($_FILES['licenciaC']['tmp_name'],$destino5);
	$licenciaC=$_FILES['licenciaC']['name'];

	$destino6 = $ruta.$_FILES['soat']['name'];
	copy($_FILES['soat']['tmp_name'],$destino6);
	$soat=$_FILES['soat']['name'];

	$destino7 = $ruta.$_FILES['registroC']['name'];
	copy($_FILES['registroC']['tmp_name'],$destino7);
	$registroC=$_FILES['registroC']['name'];

	$destino8 = $ruta.$_FILES['seguro']['name'];
	copy($_FILES['seguro']['tmp_name'],$destino8);
	$seguro=$_FILES['seguro']['name'];

	$destino9 = $ruta.$_FILES['passalvo']['name'];
	copy($_FILES['passalvo']['tmp_name'],$destino9);
	$passalvo=$_FILES['passalvo']['name'];

	$destino10 = $ruta.$_FILES['pasadoJ']['name'];
	copy($_FILES['pasadoJ']['tmp_name'],$destino10);
	$pasadoJ=$_FILES['pasadoJ']['name'];

/*
	$cc = $_POST['cc'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telefono = $_POST['celular'];
	//$fecha_nacimiento = convertirFecha($fecha_nacimiento);
*/
	/*parillero*/
	$destino11 = $ruta.$_FILES['pasado_judicial_parrillero']['name'];
	copy($_FILES['pasado_judicial_parrillero']['tmp_name'],$destino11);
	$pasado_judicial_parrillero=$_FILES['pasado_judicial_parrillero']['name'];

	$destino12 = $ruta.$_FILES['documento_identida_parrillero']['name'];
	copy($_FILES['documento_identida_parrillero']['tmp_name'],$destino12);
	$documento_identida_parrillero=$_FILES['documento_identida_parrillero']['name'];

	$destino13 = $ruta.$_FILES['registro_civil_parrillero']['name'];
	copy($_FILES['registro_civil_parrillero']['tmp_name'],$destino13);
	$registro_civil_parrillero=$_FILES['registro_civil_parrillero']['name'];

	/*
	$documento_parrillero = $_POST['documento_parrillero'];
	$nombres_parrillero = $_POST['nombres_parrillero'];
	$apellidos_parrillero = $_POST['apellidos_parrillero'];
	$edad_parrillero = $_POST['edad_parrillero'];
	$fecha_naci_parrillero = $_POST['fecha_naci_parrillero'];
*/
	$sql = "INSERT INTO propietario_moto(
	            cedula_propietario, nombre_propietario,apellidos, fecha_naci_propietario,direccion, email, telefono,cedula_escaneada_propietario, tarjeta_propieda, 
	            certificado_vecinda, licensia_conduccion, soat, registro_civil, 
	            seguro, passalvo_transito, pasado_judicial, foto)
	    VALUES ('".$cc."','".$nombres."','".$apellidos."','".$fecha_nacimiento."','".$direccion."','".$email."','".$telefono."', '".$cedula."','".$tarjetaP."','".$certificadoV."','".$licenciaC."','".$soat."','".$registroC."','".$seguro."','".$passalvo."','".$pasadoJ."','".$foto."')";            
            

	$sqlP = "INSERT INTO parrillero(
            cedula_parrillero, nombres_parrillero, apellidos_parillero, edad, 
            fecha_naci, pasado_judicial, cedula_scanner, registro_civil, 
            cedula_propietario) VALUES('".$documento_parrillero."','".$nombres_parrillero."','".$apellidos_parrillero."','".$edad_parrillero."','".$fecha_naci_parrillero."','".$pasado_judicial_parrillero."','".$documento_identida_parrillero."','".$registro_civil_parrillero."','".$cc."')";

	$sqlPP = "INSERT INTO permiso_parrillero (fecha_solicitud,estado,cedula_propietario) VALUES (CURRENT_DATE,'INICIADO','".$cc."')";

	$result = pg_query($link,$sql);
	$resultP = pg_query($link,$sqlP);
	$resultPP = pg_query($link,$sqlPP);
	
		if (!$result || !$resultP || !$resultPP) {
			echo '<script>alert("ha ocurrido un error")</script> ';
					}
	echo '<script>alert("Done")</script> ';
	header("location:formulario_permiso_parrillero1.php"); 

}
// Si los datos son correctos, procesar formulario
	if (isset($_POST['upload']) && $error==false)
	{
      echo ("<h1>Los datos se subieron con exito</h1>\n\n");
      echo ("<p>En los proximos dias te llegara un correo con la respuesta a su solicitud</h1>\n");
      echo ("<p>Muchas gracias</p>\n");
      echo ("<P>[ <A HREF='index.html'>Regresar al inicio</A> ]</P>\n");
    }
    }
else
{
	
?>



<div id="envoltura">
	<section>
		<div id="contenedor-formulario">
			

<table border="0" id="tabla_permiso_parillero">
		<form action="formulario_permiso_parrillero1.php" method="post" enctype="multipart/form-data">

<center><h2>Datos propietario</h2></center>

<tr>
	<td><input type="text" id="cajas" size="40" style="height:20px; margin:4px;" name="cc" placeholder="Documento"
		<?PHP     
		  print ("\n");
		  if ($errores["documento"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["documento"] . "</SPAN>");
		?>
	></td>
	<td><input type="text" id="cajas" size="40" style="height:20px; margin:4px;" name="nombres" placeholder="Nombres"
		<?PHP     
		  print ("\n");
		  if ($errores["nombres"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["nombres"] . "</SPAN>");
		?>
	></td>
</tr>

<tr>
	<td><input type="text" id="cajas" size="40" style="height:20px; margin:4px;" name="apellidos" placeholder="Apellidos"
		<?PHP     
		  print ("\n");
		  if ($errores["apellidos"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["apellidos"] . "</SPAN>");
		?>
	></td>
	<td><input type="date"  size="40"  name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento"
		<?PHP     
		  print ("\n");
		  if ($errores["fecha_nacimiento"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["fecha_nacimiento"] . "</SPAN>");
		?>
	></td>
</tr>
	
<tr>
	<td><input type="text" id="cajas" size="40" style="height:20px; margin:4px;" name="direccion" placeholder="Direccion"
		<?PHP     
		  print ("\n");
		  if ($errores["direccion"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["direccion"] . "</SPAN>");
		?>
	></td>
	<td><input type="email"  size="40" id="cajas" style="height:20px; margin:4px;" name="email" placeholder="E-mail"
		<?PHP     
		  print ("\n");
		  if ($errores["email"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["email"] . "</SPAN>");
		?>
	></td>
</tr>
	
<tr>
	<td><input type="text" id="cajas" size="40" style="height:20px; margin:4px;" name="celular" placeholder="Celular"
		<?PHP     
		  print ("\n");
		  if ($errores["celular"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["celular"] . "</SPAN>");
		?>
	></td>
	
</tr>
	

<tr>
	<td><p>Documento:<br/><input type="file"  size="40"   name="cedula"></p></td>
	<td><p>Foto:<br/><input type="file" size="40"  name="foto" value="Foto"></p></td>
	
</tr>
	
<tr>
	<td><p>Tarjeta propiedad:<br/><input type="file" size="40"    name="tarjetaP"></p></td>
	<td><p>Certificado vecindad:<br/><input type="file" name="certificadoV"></p></td>
	
</tr>
	
<tr>
	<td><p>Licencia conduccion:<br/><input type="file" size="40"    name="licenciaC"></p></td>
	<td><p>SOAT:<br/><input type="file" size="40"  name="soat"></p></td>
</tr>
	
<tr>
	<td><p>Registro civil:<br/><input type="file" size="40"    name="registroC"></p></td>
	<td><p>Seguro:<br/><input type="file" size="40"  name="seguro"></p></td>
</tr>

	
<tr>
	<td><p>Pas y salvo transito:<br/><input type="file" size="40"   name="passalvo"></p></td>
	<td><p>Pasado Judicial:<br/><input type="file" size="40"  name="pasadoJ"></p></td>
</tr>
	
<!--FORMULARIO PARRILLERO-->
<tr>
<td><h2>Datos Parrillero</h2></tr></td>
<tr>
	<td><input type="text" size="40" style="height:20px; margin:4px;" name="documento_parrillero" id="cajas" placeholder="Documento"
		<?PHP     
		  print ("\n");
		  if ($errores["documento_parrillero"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["documento_parrillero"] . "</SPAN>");
		?>
	></td>:
	<td><input type="text"size="40" style="height:20px; margin:4px;"  name="nombres_parrillero" id="cajas" placeholder="Nombres"
		<?PHP     
		  print ("\n");
		  if ($errores["nombres_parrillero"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["nombres_parrillero"] . "</SPAN>");
		?>
	></td>
</tr>

<tr>
	<td><input type="text" size="40" style="height:20px; margin:4px;" name="apellidos_parrillero" id="cajas" placeholder="Apellidos"
		<?PHP     
		  print ("\n");
		  if ($errores["apellidos_parrillero"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["apellidos_parrillero"] . "</SPAN>");
		?>
	></td>
	<td><input type="text" size="40" style="height:20px; margin:4px;" name="edad_parrillero" id="cajas" placeholder="Edad"
		<?PHP     
		  print ("\n");
		  if ($errores["edad_parrillero"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["edad_parrillero"] . "</SPAN>");
		?>
	></td>
</tr>

<tr>
	<td><input type="date" size="40"  name="fecha_naci_parrillero" size="40"  id="fecha_naci_parrillero" placeholder="Fecha Nacimiento"
		<?PHP     
		  print ("\n");
		  if ($errores["fecha_naci_parrillero"] != "")
		    print ("<br/><SPAN CLASS='error'>" . $errores["fecha_naci_parrillero"] . "</SPAN>");
		?>
	></td>
	<td><p>Pasado judicial<br><input type="file" name="pasado_judicial_parrillero"></p></td>
</tr>

<tr>
	<td><p>Documento identidad</br><input type="file"  size="40" style="height:20px; margin:4px;"  name="documento_identida_parrillero"></p></td>
	<td><p>Registro civil<br><input type="file"size="40" style="height:20px; margin:4px;"  name="registro_civil_parrillero"></p></td>
</tr>

<tr><td></td></tr>

<tr>
	<td><center>
	<input type="submit" name="upload" value="Enviar">
	<input type="reset" name="resetear" value="Restablecer">
	</center>
	</td>
</tr>
	
</table>
</form>


		</div>
		<aside class="barra-lateral">
			
			<hgroup>
				
			</hgroup>
			<img src="img/INSTRUCCIONES.PNG" alt="instrucciones" width="280" height="700">

		</aside>
	</section>
</div>



<?php
	}
	
	include('piedepagina.php');
?>