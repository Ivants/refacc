<?php
/**
 * Proveedor de las constantes para conectarse a la base de datos Mysql.
 */
define("HOSTNAME", "mysql.hostinger.mx");	//host
define("DATABASE", "u929355182_refac"); 		//base de datos
define("USERNAME", "u929355182_refac"); 		//usuario
define("PASSWORD", "refac123"); 			//contraseña


	$host = 'mysql.hostinger.mx';
	$user = 'u929355182_refac';
	$pass = 'refac123';
	$db = 'u929355182_refac';

	$con=mysqli_connect($host,$user,$pass,$db);
	if (mysqli_connect_errno())
	{
		echo "Error en la conexión: " . mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");

?>