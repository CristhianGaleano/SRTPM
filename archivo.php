


<?php 
require('cabecera.php');
require('connect_bd.php');
include('procesar/operaciones.php');

$nombreT = $_GET['nombreT'] ;
$llaves = $_GET['llaves'] ;
$id = $_GET['cc'] ;
$nombreC = $_GET['nombreC'] ;

//echo "Column: ".$nombreC. " <br/> nombreT: " .$nombreT. "<br/>  id:  " .$id. "<br/>  llaves: " .$llaves ;

//metodo donde hago la consulta a la BD
$datos = encontrarArchivo($id);

?>

<iframe id="iframe" src="upload/<?php echo $datos[$nombreC]; ?>"></iframe>





<?php
require('piedepagina.php');
 ?>
