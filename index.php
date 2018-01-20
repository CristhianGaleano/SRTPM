<?php require_once 'config/config.php'; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>SRTPM | Sistema de Registro y Tramite Permisos Movilidad</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/styleLogin.css" />
    <link rel="stylesheet" href="iconos.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
</head>
<body>
    <div id="bar">
        <div id="logo">
        <ul>
            <li style="padding-left: 50px;"><a href="http://amco.gov.co/" target="_blank"><img src="img/logo-amco.png" alt="amco" height="75" ></a></li>
            <li style="padding-left: 190px;"><a href=" <?php echo URL?>formulario_permisoH_extendido.php" target="_blank"><img src="img/horario-extendido.png" alt="amco" height="75" ></a></li>
            <li style="padding-left: 20px;"><a href=" <?php echo URL?>formulario_permiso_parrillero1.php" target="_blank"><img src="img/permiso-parrrillero.png" alt="amco" height="75"></a></li>
        </ul>       
        </div>



        <div id="container">
            <!-- Login Starts Here -->
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" action="login_script.php" method="post">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Usuario</label>
                                <input type="text" name="user" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Contraseña</label>
                                <input type="password" name="pass" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Recordarmela</label>
                        </fieldset>
                        <span><a href="#">Olvidastes tu contraseña</a></span>
                        <span><a href="#">No tienes cuenta?</a></span>
                    </form>
                </div>
            </div>
            <!-- Login Ends Here -->
        </div>
    </div>
    <video id="video1" loop autoplay  muted preload poster="img/fondo.jpg">
        <source src="videos/Pereira.mp4" type="video/mp4"/>
    </video>


    <!--iconos redes sociales-->
    
    <div class="barra-sociales">
        <ul>
            <li><a href="http://www.google.com" target="_blank"  class="icon-google-plus3"></a></li>
            <li><a href="http://www.facebook.com" target="_blank" class="icon-facebook3"></a></li>
            <li><a href="http://www.twitter.com" target="_blank" class="icon-twitter3"></a></li>
            <li><a href="http://www.youtube.com"target="_blank"  class="icon-youtube3"></a></li>
            
        </ul>
    </div>


    <footer>
        <img src="img/img_chat.png" alt="chat en línea" style="position: fixed; bottom: 10px; right: 5px;  width: 200px;">
        <div id="logos_footer">
            <ul>
                <li><a href="http://www.pereira.gov.co/es/inicio.html" target="_blank"><img src="img/logo-alcaldia.jpg" alt="alcaldia de pereira"></a></li>
                <li><a href="http://www.ucp.edu.co/" target="_blank"><img src="img/logo-universidad-catolica.jpg" alt="Universidad Catolica Pereira"></a></li>
                <li><a href="http://wp.presidencia.gov.co/Paginas/presidencia.aspx" target="_blank"><img src="img/logo-colombia.jpg" alt="Repubica de Colombia"></a></li>
            </ul>
            <h4>Todos los derechos reservados - Secretaria de Movilidad de Pereira</h4>
        </div>
    </footer>
</body>
</html>
