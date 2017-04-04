<?php
/**
 * Provee las constantes para conectarse a la base de datos
 * Mysql.
 */

/*
define("HOSTNAME", "mysql.hostinger.mx");	//host
define("DATABASE", "u929355182_refac"); 		//base de datos
define("USERNAME", "u929355182_refac"); 		//usuario
define("PASSWORD", "refac123"); 			//contraseña
*/
define("HOSTNAME", "localhost");	//host
define("DATABASE", "erp"); 		//base de datos
define("USERNAME", "root"); 		//usuario
define("PASSWORD", "UniX-21-21"); 			//contraseña

		$conexion =  mysqli_connect('localhost','root','UniX-21-21','erp');//LOCAL



/*
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



*/




?>