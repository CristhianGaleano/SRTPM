<?php 
include ("cabecera.php");
session_start();

if (!$_SESSION) {
	header("location:index.html");
}
?>
<center>
<img src="img/relleno.png" >
</center>
<?php include ("piedepagina.php");
?>

