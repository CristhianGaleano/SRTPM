
<?php
require_once 'cabecera.php';
require_once 'config/config.php';
require_once 'procesar/Conexion.php';
require_once 'procesar/operaciones.php';

$con = getConexion($bd_config);

/*http://jpsprogramacion.es/ordenar-tablas-con-jquery-tablesorter/*/
        #$consulta = pg_query($sql) or die ('Error query' . pg_last_error());

$result = buscarSolicitudesHE($con);        

?>
<div id="encierra-solicitudP">
<div id="titulo">
    <center><h1>SOLICITUDES PERMISO HORARIO EXTENDIDO</h1>
        <img src="img/document228.png">
    </center>
</div>
<table id="tablaEjemplo"> 
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
        <?php  
        foreach ($result as $row) {
            ?>
            <tr>

                 <td><?php echo $row['cedula_propietario'];?></td>
                <td><?php echo $row['nombre_propietario'];?></td>    
                <td><?php echo $row['apellidos'];?></td>
                <td><?php echo $row['fecha_solicitud']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <?php echo "<td><a href='area_permisos_extendidos.php?id=".$row['cedula_propietario']."'><img src='img/pencil113.png' height='26'></a></td>";?>
            </tr>
          <?php } ?>
        </tbody>
   </table>
</div>
<?php
include('piedepagina.php');
?>