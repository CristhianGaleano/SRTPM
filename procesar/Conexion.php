<?php 
	require_once 'config/config.php';
	function getConexion($bd_config)
	{
		try {
			$conexion = new PDO("mysql:host=".$bd_config['hostw'].";dbname=".$bd_config['nameBDw'],$bd_config['userNamew'],$bd_config['passwordw']);
		} catch (PDOException $e) {
			echo "Error ". $e->getMessage();
		}
		return $conexion;
	}

	function closeConexion($con)
		{
			return $con = null;
		}
 ?>