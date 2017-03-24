<?php
	//Archivo de conexión a la base de datos
	require('mysql_login.php');
	//Variable de búsqueda
	$consultaBusqueda = $_POST['busqueda'];
	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
	$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = "";
	//Comprueba si $consultaBusqueda está seteado
	if (isset($consultaBusqueda)) {
		//Selecciona todo de la tabla mmv001 
		//donde el nombre sea igual a $consultaBusqueda, 
		//o el apellido sea igual a $consultaBusqueda, 
		//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
		$consulta = mysqli_query($con, "SELECT * FROM PRODUCTOS
		WHERE CATEGORIA,CODIGO,DESCRIPCION,MARCA COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'");
	};
?>