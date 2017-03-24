<?php
/**
 * Provee las constantes para conectarse a la base de datos
 * Mysql.
 */
define("HOSTNAME", "mysql.hostinger.mx");	//host
//define("HOSTNAME", "localhost");			//host
define("DATABASE", "u929355182_dbmt"); 		//base de datos
define("USERNAME", "u929355182_ivan"); 		//usuario
define("PASSWORD", "MiEquipo1.0"); 			//contraseña



	$host = 'mysql.hostinger.mx';
	$db = 'u929355182_dbmt';
	$user = 'u929355182_ivan';
	$pass = 'MiEquipo1.0';

	$con=mysqli_connect($host,$user,$pass,$db);
	if (mysqli_connect_errno())
	{
		echo "Error en la conexión: " . mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");








?>