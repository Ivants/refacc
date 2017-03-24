<?php




	//Archivo de conexión a la base de datos
	//require('mysql_login.php');
	require 'Usuarios.php';
	//Variable de búsqueda
	$consultaBusqueda = $_POST['busqueda'];
	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
	$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = "no encuentro nadaaaaaaaaaaaaaaaaaaaaa! :O";
	//Comprueba si $consultaBusqueda está seteado
	if (isset($consultaBusqueda)) {
		//Selecciona todo de la tabla mmv001 
		//donde el nombre sea igual a $consultaBusqueda, 
		//o el apellido sea igual a $consultaBusqueda, 
		//o $consultaBusqueda sea igual a nombre + (espacio) + apellido


		/**
		 * Obtiene todas las alumnos de la base de datos
		 */
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Manejar petición GET
			$alumnos = usuarios::getProducts();
			if ($alumnos) {
				$datos["estado"] = 1;
				$datos["productos"] = $alumnos;
				print json_encode($datos);
			} else {
				print json_encode(array(
					"estado" => 2,
					"mensaje" => "Ha ocurrido un error"
				));
			}
		}



		/*


		$consulta = mysqli_query($con, "SELECT * FROM PRODUCTOS
		WHERE CATEGORIA,CODIGO,DESCRIPCION,MARCA COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'");

		*/






	};






?>