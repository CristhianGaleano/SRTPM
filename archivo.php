<?php 
session_start();
require_once 'config/config.php';
require_once 'procesar/Conexion.php';
include('procesar/operaciones.php');
if (!$_SESSION) {//si no existe nada en la matriz asociativa deuelva a la pagina de logueo
	header("location:index.html");
}

$con = getConexion($bd_config);

$nombreT = $_GET['nombreT'] ;
$llaves = $_GET['llaves'] ;
$propietario = $_GET['propietario'] ;
$nombreC = $_GET['nombreC'] ;

//echo "Column: ".$nombreC. " <br/> nombreT: " .$nombreT. "<br/>  propietario:  " .$propietario. "<br/>  llaves: " .$llaves ;

	if ($llaves=="permisoH") {
	//metodo donde hago la consulta a la BD
	$datos = encontrarArchivo($nombreT,$nombreC,$propietario,$con);
		
	}else{
		#echo "Buscando archivo PP";
		$datos = encontrarArchivoPP($nombreT,$nombreC,$propietario,$con);
	}

require_once 'cabecera.php';
?>

<iframe id="iframe" src="upload/<?php echo $datos[$nombreC]; ?>"></iframe>





<?php
require('piedepagina.php');
 ?>
