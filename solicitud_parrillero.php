<?php
require('cabecera.php');
require('connect_bd.php');
session_start();

if (!$_SESSION) {
	header("location:index.html");
}


$sql = 'SELECT  propietario_moto.cedula_propietario,nombre_propietario, apellidos,fecha_solicitud,direccion,telefono,email,estado FROM propietario_moto, permiso_parrillero where propietario_moto.cedula_propietario = permiso_parrillero.cedula_propietario';
        $consulta = pg_query($sql) or die ('Error query' . pg_last_error());

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
            <?php while ($row = pg_fetch_array($consulta)) { ?>
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