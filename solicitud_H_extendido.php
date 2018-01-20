
<?php
require('cabecera.php');
require('connect_bd.php');
/*http://jpsprogramacion.es/ordenar-tablas-con-jquery-tablesorter/*/
$sql = 'SELECT  propietario_moto.cedula_propietario,nombre_propietario, apellidos,fecha_solicitud,propietario_moto.direccion,propietario_moto.telefono,email,estado FROM propietario_moto, permiso_horario_extendido, empresa where propietario_moto.cedula_propietario = permiso_horario_extendido.cedula_propietario and empresa.nit = permiso_horario_extendido.nit';
        $consulta = pg_query($sql) or die ('Error query' . pg_last_error());
        

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
        <?php while ($row = pg_fetch_array($consulta)) { ?>
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