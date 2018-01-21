<?php
	require_once 'config/config.php';
	require_once 'procesar/Conexion.php';
	require_once 'procesar/operaciones.php';

	$con = getCOnexion($bd_config);
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SRTPM | Sistema de Registro y tramite Permisos Motociclistas</title>
	<meta name="description" content="Solicitu de permisos para parillero y horario extendido para motociclistasen la ciudad de pereira"/>
	<meta charset="utf-8">

    <link rel="shortcut icon" href="img/favicon.ico">

	<link rel="stylesheet" type="text/css" href="<?php URL ?>css/estilos.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php URL ?>css/styleLetraAnimada.css">-->
    <link rel="stylesheet" type="text/css" href="<?php URL ?>css/styleTable.css" />
    <link rel="stylesheet" type="text/css" href="<?php URL ?>css/calendario.css">
    

	<script src="main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/calendario.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
        
     <script type="text/javascript">

             $(function(){
                $("#fecha_nacimientoPHE").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });
                
             })

      </script>
</head>

<body>
<?php 
  
//datos dueño
$errores["documento"] = "";
$errores["nombres"] = "";
$errores["apellidos"] = "";
$errores["fecha_nacimiento"] = "";
$errores["direccion"] = "";
$errores["email"] = "";
$errores["celular"] = "";
$errores["nit"] = "";


$error = false;
if (isset($_POST['enviar']))
{
	$cc = $_POST['cc'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$fecha_nacimiento = convertirFecha($fecha_nacimiento);
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telefono = $_POST['celular'];
	$nit = $_POST['nit'];



	if (empty($cc) || (!is_numeric($cc))){
         $errores["documento"] = "¡Se requiere un Documento Válido!";
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
    	$errores["apellidos"] = "";
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
	if (empty($nit)){//
         $errores["nit"] = "¡El nit es Requerido!";
         $error = true;
    }
    else
    	$errores["nit"] = "";

}

   // si el formulario ha sido enviado y los datos son correctos
// Procesar los datos falta procesar los archivos se debe hacer mediante java scrip
if (isset($_POST['enviar']) && $error==false)
{
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

	//empresa
	$destino11 = $ruta.$_FILES['carta']['name'];
	copy($_FILES['carta']['tmp_name'],$destino11);
	$carta=$_FILES['carta']['name'];	

    
    $resultP = registrarPM($cc,$nombres,$apellidos,$fecha_nacimiento,$direccion,$email,$telefono,$cedula,$tarjetaP,$certificadoV,$licenciaC,$soat,$registroC,$seguro,$passalvo,$pasadoJ,$foto,$con);
    $resultE = registrarE($nit,$carta,$con);
    $resultPHE = registrarPHE($cc,$nit,$con);


if ($resultP && $resultE && $resultPHE) {
			echo '<script>alert("Datos enviados...")</script> ';
			//header("location:formulario_permiso_parrillero1.php");
		}
		else
			echo '<script>alert("ha ocurrido un error")</script> ';

	// Si los datos son correctos, procesar formulario
	if (isset($_POST['enviar']) && $error==false)
	{
      echo ("<h1>Los datos se subieron con exito</h1>\n\n");
      echo ("<p>En los proximos dias te llegara un correo con la respuesta a su solicitud</h1>\n");
      echo ("<p>Muchas gracias</p>\n");
      echo ("<P>[ <A HREF='index.php'>Regresar al inicio</A> ]</P>\n");
    }


    //cerramos la conexion
    closeConexion($con);

		}
else
{

?>



<div id="envoltura">

<div >
	<img src="img/banner.png"  width='1200px' style="margin-left:37px;">
</div>
	<section>
		<div id="contenedor-formulario">
			<hgroup>
				<h2 style="font-family:monospace">FORMULARIO PERMISO EXTENDIDO</h2>
			</hgroup>	

			<form action="formulario_permisoH_extendido.php" method="post" enctype="multipart/form-data">
			<!--tabla-->
		<p><label><input type="text"   id="cajas" size="30" style="height:20px; margin:4px;"   name="cc" placeholder="Documento"
			<?php 
				if (isset($_POST['enviar']))
      			print (" VALUE='$cc'>\n");
			else
				print("\n");
				if ($errores['documento'] != "") 
					print("<br/> <SPAN CLASS='error'></br>" . $errores["documento"] . "</SPAN>");//span contenedor en linea
			?>
			></label>
			<label><input type="text" id="cajas" size="30" style="height:20px; margin:4px;"   name="nombres" placeholder="Nombres"
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$nombres'>\n");
			else 
				print("\n");
				if ($errores['nombres'] != "") {
					print("<br/><SPAN CLASS='error'>" . $errores["nombres"] . "</SPAN>");
				}
			 ?>
			></label>
			<label><input type="text"  id="cajas" size="30" style="height:20px; margin:4px;"  name="apellidos" placeholder="Apellidos" 
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$apellidos'>\n");
			else 
				print("\n");
				if ($errores["apellidos"] != "") {
					print("<br/> <SPAN CLASS='error'>" . $errores["apellidos"] . "</SPAN>");
				}
			 ?>
			></label></p>

			<p><label><input type="text"  id="cajas" size="30" style="height:20px; margin:4px;"  name="direccion" placeholder="Direccion"
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$direccion'>\n");
			else 
			print("\n");
				if ($errores["direccion"] != "") {
					 print("<br/><SPAN CLASS='error'>" . $errores["direccion"] . "</SPAN>");
				}

			 ?>
			></label>
			<label><input type="email"  id="cajas" size="30" style="height:20px; margin:4px;"  name="email" placeholder="E-mail"
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$email'>\n");
			else 
			print("\n");
				if ($errores["email"] != "") {
					print("<br/><SPAN CLASS='error'>" . $errores["email"] . "</SPAN>");
				}
			 ?>
			></label>
			<label><input type="text"  id="cajas" size="30" style="height:20px; margin:4px;"  name="celular" placeholder="Celular"
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$telefono'>\n");
			else 
			print("\n");
				if ($errores["celular"] != "") {
					print("<br/><SPAN CLASS='error'>" . $errores["celular"] . "</SPAN>");
				}
			 ?>
			></label></p>
			<p><label><input type="text"  id="cajas" size="30" style="height:20px; margin:4px;"  name="nit" placeholder="NIT"
			<?php
				if (isset($_POST['enviar']))
      			print (" VALUE='$nit'>\n");
			else 
			print("\n");
				if ($errores["nit"] != "") {
					print("<br/><SPAN CLASS='error'>" . $errores["nit"] . "</SPAN>");
				}
			 ?>
			></label>
			<label><input type="text" name="fecha_nacimiento" id="fecha_nacimientoPHE" placeholder="Fecha de nacimiento"
			<?php 
			print("\n");
				if ($errores["fecha_nacimiento"] != "") {
					print("<br/> <SPAN CLASS='error'>" . $errores["fecha_nacimiento"] . "</SPAN>");
				}
			 ?>
			></label></p>
			<br/><br/>
	<h3>Por favor Adjunte los siguientes documentos</h3>		
		<p><label class="doble_columna">Documento:<br/><input type="file" name="cedula" ></label>
		Foto:<br/><input type="file" name="foto" ></p>
		
		<p><label class="doble_columna">Tarjeta propiedad:<br/><input type="file" name="tarjetaP" ></label>
		Certificado de vecindad:<br/><input type="file" name="certificadoV" ></p>
		
		<p><label class="doble_columna">Licencia de conduccion:<br/><input type="file" name="licenciaC" ></label>
		SOAT:<br/><input type="file" name="soat" value="SOAT"></p>

		<p><label class="doble_columna">Registro Civil:<br/><input type="file" name="registroC" ></label>
		Seguro:<br/><input type="file" name="seguro"></p>
		
		<p><label class="doble_columna">Pas y salvo:<br/><input type="file" name="passalvo" ></label>
		Pasado judicial: <br/><input type="file" name="pasadoJ" ></p>
		
		<p><label class="doble_columna">Carta de la empresa:<br/><input type="file" name="carta"></label></p>
	
<br/><br/><br/>
	<p>
		<center>
			<input type="submit" name="enviar" value="Enviar">
			<input type="reset" name="resetear" value="Restablecer">
		</center>
	</p>
</form>

		</div>
		<aside class="barra-lateral">
		
		<img src="img/extendido.png" alt="Permiso_extendido" height="546" width="285">
				
		</aside>
	</section>
</div>


<?php
}
	include('piedepagina.php');
?>