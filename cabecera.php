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

             /*
             $(function(){
                $("#fecha_nacimiento").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });

                $("#fecha_naci_parrillero").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });

                $("#fecha_nacimientoPHE").datepicker({
                    changeMonth:true,
                    changeYear:true,
                });

                
             })
  estas funciones deben estar o ya estan agregadas en el mismo formulario
*/

      </script>

        
</head>

<body>

	 <!---Recursos que he utilizado:
https://www.youtube.com/watch?v=9me1HvKs_1U&list=PLQxwboeYZFIdMPktCS5m9L8_JdgeqC7mG&index=18

http://www.falconmasters.com/web-design/tutorial-menu-de-navegacion-fijo/

	 -->
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