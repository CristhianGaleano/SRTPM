<?php require_once 'config/config.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SRTPM | Sistema de Registro y tramite Permisos Motociclistas</title>
	<meta name="description" content="Solicitu de permisos para parillero y horario extendido para motociclistasen la ciudad de pereira"/>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico">
	  <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/styleLetraAnimada.css">
    <link rel="stylesheet" type="text/css" href="css/styleTable.css" />
    <link rel="stylesheet" type="text/css" href="css/calendario.css">
	<script src="main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/calendario.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 
     <script type="text/javascript">
             $(document).ready(function()
         {
             $("#tablaEjemplo").tablesorter();
             $("#tabla_permiso_parrillero").tablesorter();
         }); 
      </script>        
</head>
<body>
<header>
  <section class="wrapper">
        <nav> 
            <ul>
                <li><div id="logo"><img src="img/logo-amco.png" alt="amco" height="75" ></div></li>
                <li><a href=" <?php URL?>principal.php">Inicio</a></li>
                <li><a href=" <?php URL?>solicitud_H_extendido.php">Solicitudes horario extendido</a></li>
                <li><a href=" <?php URL?>solicitud_parrillero.php">Solicitudes Parrillero</a></li>  
            </ul>
    </nav >
    <div class="contenedor">
    <p>Bienvenido</p>
    <ul>
        <li>Señor(a)</li>
        <li>Administrador</li>
        <li>SRTPM</li>
    </ul>
    <nav class="sesion">
        <a href="cerrar_sesion.php">Cerrar</a>
    </nav>
    </section>
</header>
<section class="contenido wrapper">