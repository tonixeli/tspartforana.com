<?php
	/* conexion a la base de datos de Localhost (Pruebas) */

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'tspartforana';
	

	/* conexion a la base de datos de Hostalia (Produccion)

	$host = 'PMYSQL153.dns-servicio.com';
	$user = 'user-8899294';
	$password = '7037AMPegasus$$$$$';
	$db = '8899294_cooperativa';
*******************************************************************
	*/

	$conection = mysqli_connect($host,$user,$password,$db);

	if (!$conection) {
		echo "Error en la conexion";
	}
?>

