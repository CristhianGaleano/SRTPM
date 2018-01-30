<?php
session_start();
require_once 'cabecera.php';
require_once 'config/config.php';
require_once 'procesar/Conexion.php';

$con = getConexion($bd_config);

if (!$_SESSION) {
	header("location:index.html");
}


$sql = "SELECT permiso_parrillero.fecha_solicitud,permiso_parrillero.estado,parrillero.cedula_parrillero,propietario_moto.cedula_propietario,propietario_moto.nombre_propietario,propietario_moto.apellidos,propietario_moto.email,propietario_moto.telefono,propietario_moto.direccion FROM permiso_parrillero INNER JOIN parrillero ON permiso_parrillero.parrillero_cedula_parrillero=parrillero.cedula_parrillero INNER JOIN propietario_moto ON permiso_parrillero.propietario_moto_cedula_propietario=propietario_moto.cedula_propietario";
    

    $stm = $con->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll();

?>


<div id="encierra-solicitudP">   
<div id="titulo">
    <center><h1 style="fon">SOLICITUDES PARRILLLERO</h1>
    <img src="img/document228.png">
    </center>
</div>

<table id="tabla_permiso_parrillero"> 
        <thead>
            <tr>
                <th>DOCUMENTO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA SOLICITUD</th>
                <th>DIRECCION</th>
                <th>E-MAIL</th>
                <th>TELEFONO</th>
                <th>ESTADO</th>
            </tr>
      
        </thead>
        <tbody>
            <?php foreach ($result as $row) {?>
            <tr>

                <td id="row1"><?php echo $row['cedula_propietario'];?></td>
                <td id="row2"><?php echo $row['nombre_propietario'];?></td>    
                <td id="row1"><?php echo $row['apellidos'];?></td>
                <td id="row2"> <?php echo $row['fecha_solicitud']; ?></td>
                <td id="row1"><?php echo $row['direccion']; ?></td>
                <td id="row2"><?php echo $row['email']; ?></td>
                <td id="row1"><?php echo $row['telefono']; ?></td>
                <td id="row2"><?php echo $row['estado']; ?></td>
                <?php echo "<td id='editar'><center><a href='area_permisos_parrillero.php?id=".$row['cedula_propietario']."'><img src='img/pencil113.png' height='26'></a></td>";?>

            </tr>
         
             <?php } ?>
        </tbody>
  </table>
</div>
           

<?php
include('piedepagina.php');
?>