<?php session_start();
if (empty($_SESSION)) {
	header ("location: index.php");
	#echo "Entro";
}
#var_dump($_SESSION);
include "cabecera.php";

?>
<center>
<img src="img/relleno.png" >
</center>
<?php include ("piedepagina.php");
?>


