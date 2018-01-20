<?php 
include('connect_bd.php');
//matriz de errores
$errores["nombres"] = "";
$errores["usuario"] = "";
$errores["e-mail"] = "";
$errores["contrasena1"] = "";
$errores["contrasena2"] = "";


 $error = false;
	if (isset($_POST['enviar'])) {//si existe 'enviar' hacer
		$nombres = $_POST['nombres'];
		$usuario = $_POST['usuario'];
		$email = $_POST['e-mail'];
		$contrasena1 = $_POST['contrasena1'];
		$contrasena2 = $_POST['contrasena2'];

		if (empty($nombres)) {
			$errores["nombres"] = "Debe especificar sus nombres!";
			$error = true;	
		}else
		$errores["nombres"] = "";

		if (empty($usuario)) {
			$errores["usuario"] = "Debe especificar un usuario!";
			$error = true;
		}
		$errores["usuario"] = "";

		if (empty($email)) {
			$errores["e-mail"] = "Debe especificar un correo!";
			$error = true;
		}else
		$errores["e-mail"] = "";

		if (empty($contrasena1)) {
			$errores["contrasena1"] = "Debe especificar la contraseña!";
			$error = true;
		}else
		$errores["contrasena1"] = "";

		if (empty($contrasena2)) {
			$errores["contrasena2"] = "Repita la contraseña!" ;
			$error = true;
		}else
		$errores["contrasena2"] = "";


	}//fin del if


	//verificamos que ademas la variable error este en false para proseguir
	if (isset($_POST['enviar']) && $error == false) {
		$sql = "INSERT INTO usuariosm(
            nombres, email, usuario, contrasena)
    VALUES ('".$nombres."', '".$email."', '".$usuario."', '".$contrasena1."')";
	

	$result = pg_query($sql);
	if ($result) {

		header('location: registro_nuevo_usuario.php');
	}
}else{

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>SRTPM | Sistema de Registro y Tramite Permisos Motocicletas</title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>


<form action="registro_nuevo_usuario.php" method="post">
	<p>Nombres</p>
		<input type="text" name="nombres" <?php 
				print("\n");
				if ($errores['nombres'] != "") 
					print("<br/> <SPAN CLASS='error'>" . $errores["nombres"] . "</SPAN>");
			?> >
	<p>Nombre de usuario</p>
		<input type="text" name="usuario" <?php print("\n"); 
		if ($errores["usuario"] != "") {
			print("<br/><SPAN CLASS='error'>" . $errores["usuario"] . "</SPAN>");
		} ?> >
	<p>E-mail</p>
		<input type="email" name="e-mail" <?php print("\n"); 
		if ($errores["e-mail"] != "") {
			print("<br/><SPAN CLASS='error'>" . $errores["e-mail"] . "</SPAN>");
		} ?> >
	<p>Contraseña</p>
		<input type="password" name="contrasena1" <?php print("\n"); 
		if ($errores["contrasena1"] != "") {
			print("<br/><SPAN CLASS='error'>" . $errores["contrasena1"] . "</SPAN>");
		} ?> >
	<p>Contraseña</p>
		<input type="password" name="contrasena2" <?php print("\n"); 
		if ($errores["contrasena2"] != "") {
			print("<br/><SPAN CLASS='error'>" . $errores["contrasena2"] . "</SPAN>");
		} ?> >
	</p>
	<input type="submit" name="enviar" value="Registrar">

</form>

</body>
</html>
<?php 
}
 ?>