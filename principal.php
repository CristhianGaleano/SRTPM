<?php 
session_start();
include ("cabecera.php");
if (!$_SESSION) {
	header("location:index.html");
}
?>
<center>
<img src="img/relleno.png" >
</center>
<?php include ("piedepagina.php");
?>


