<?php 
	require_once 'config/config.php';
	function getConexion($bd_config)
	{
		try {
			$conexion = new PDO("mysql:host=".$bd_config['host'].";dbname=".$bd_config['nameBD'],$bd_config['userName'],$bd_config['password']);
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