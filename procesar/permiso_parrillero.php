<?php 
include('../connect_bd.php');
require('../procesar/operaciones.php');

    $ruta = "../upload/";
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

$cc = $_POST['cc'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['celular'];

$fecha_nacimiento = convertirFecha($fecha_nacimiento);
echo $fecha_nacimiento;

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


$documento_parrillero = $_POST['documento_parrillero'];
$nombres_parrillero = $_POST['nombres_parrillero'];
$apellidos_parrillero = $_POST['apellidos_parrillero'];
$edad_parrillero = $_POST['edad_parrillero'];
$fecha_naci_parrillero = $_POST['fecha_naci_parrillero'];

$sql = "INSERT INTO propietario_moto(
            cedula_propietario, nombre_propietario,apellidos, fecha_naci_propietario,direccion, email, telefono,cedula_escaneada_propietario, tarjeta_propieda, 
            certificado_vecinda, licensia_conduccion, soat, registro_civil, 
            seguro, passalvo_transito, pasado_judicial, foto)
    VALUES ('".$cc."','".$nombres."','".$apellidos."','".$fecha_nacimiento."','".$direccion."','".$email."','".$telefono."', '".$cedula."','".$tarjetaP."','".$certificadoV."','".$licenciaC."','".$soat."','".$registroC."','".$seguro."','".$passalvo."','".$pasadoJ."','".$foto."')";
            
            

$sqlP = "INSERT INTO parrillero VALUES('".$documento_parrillero."','".$nombres_parrillero."','".$apellidos_parrillero."','".$edad_parrillero."','".$fecha_naci_parrillero."','".$pasado_judicial_parrillero."','".$documento_identida_parrillero."','".$registro_civil_parrillero."')";

$sqlPP = "INSERT INTO permiso_parrillero (fecha_solicitu,estado)VALUES (CURRENT_DATE,'INICIADO')";

$result = pg_query($link,$sql);
$resultP = pg_query($link,$sqlP);
$resultPP = pg_query($link,$sqlPP);
           if ($result && $resultP && $resultPP) {
        header("location:../formulario_permiso_parrillero.php");
    }

 ?>