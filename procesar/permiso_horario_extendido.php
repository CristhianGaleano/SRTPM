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

//empresa
$destino11 = $ruta.$_FILES['carta']['name'];
copy($_FILES['carta']['tmp_name'],$destino11);
$carta=$_FILES['carta']['name'];


$cc = $_POST['cc'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$celular = $_POST['celular'];
//empresa
$nit = $_POST['nit'];


$fecha_nacimiento = convertirFecha($fecha_nacimiento);


$sql = "INSERT INTO propietario_moto(
            cedula_propietario, nombre_propietario,apellidos, fecha_naci_propietario,direccion, email, telefono,cedula_escaneada_propietario, tarjeta_propieda, 
            certificado_vecinda, licensia_conduccion, soat, registro_civil, 
            seguro, passalvo_transito, pasado_judicial, foto)
    VALUES ('".$cc."','".$nombres."','".$apellidos."','".$fecha_nacimiento."','".$direccion."','".$email."','".$celular."', '".$cedula."','".$tarjetaP."','".$certificadoV."','".$licenciaC."','".$soat."','".$registroC."','".$seguro."','".$passalvo."','".$pasadoJ."','".$foto."')";
            
$sqlE = "INSERT INTO empresa (nit, carta) VALUES ('".$nit."','".$carta."')";

$result = pg_query($link,$sql);
$resultE = pg_query($link,$sqlE);

/*enviar datos a la tabla permiso_horario_extendido */
$sqlExtendido = "INSERT INTO permiso_horario_extendido () VALUES ()";

           if ($result && $resultE) {
        header("location:../formulario_permisoH_extendido.php");
    }

 ?>