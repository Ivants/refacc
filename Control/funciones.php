<?php
	$conexion=null;

	function conectar(){
		global $conexion;
		$conexion =  mysqli_connect('localhost','root','UniX-21-21','inmobiliaria');
		mysqli_set_charset($conexion,'utf8');
	}

	function getTodasCategorias(){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias") or die (mysqli_error('Error: '.$conexion));
		return $respuesta;
	}

	function getCategoriasPorUser(){
		global $conexion;
		$user = $_SESSION['usuario'];
		$respuesta = mysqli_query($conexion, "SELECT C.name_Categoria, C.ruta
												FROM usuarios U
												INNER JOIN categorias C
												on U.catUno = 1
												and U.catDos = 2
												and U.catTres = 3
												and U.catCuatro = 4
												and U.catCinco = 5
												and U.catSeis = 6
												WHERE usuario='".$user."'") or die (mysqli_error('Error: '.$conexion));
		return $respuesta;
	}

	function getCategoriaPorId($id){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias WHERE ID_Categoria =  ".$id);
		return mysqli_fetch_row($respuesta);
	}

	function editarCategoria($id, $nombre, $descripcion, $ruta){
		global $conexion;
		mysqli_query($conexion, "UPDATE categorias
									SET categoria='".$nombre."', descripcion='".$descripcion."', ruta='".$ruta."'
									WHERE ID_Categoria=".$id);
	}

    function editarInmueble($id, $nombreInm, $descripcionInm, $telefono, $precio, $direccion){
		global $conexion;
		mysqli_query($conexion, "UPDATE descripcion, inmueble
									SET nombreInm='".$nombreInm."', descripcionInm='".$descripcionInm."',  precio=$precio ,telefono='".$telefono."', direccion='".$direccion."'
									WHERE ID_Descripcion=$id and ID_Inmueble=$id");
	}

    function eliminarInmueble($id){
		global $conexion;
		mysqli_query($conexion, "DELETE inmueble, descripcion, fecha FROM inmueble, descripcion, fecha  WHERE ID_Descripcion=$id AND ID_Inmueble=$id AND ID_Fecha=$id");
	}


    function getInmueble(){
        global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT ID_Descripcion,nombreInm
												FROM descripcion WHERE usuario = '".$_SESSION['usuario']."'");
		return $respuesta;
        }

    function getInmueblePorId($id){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT ID_Descripcion, nombreInm, precio, telefono, descripcionInm, direccion, fechaPub FROM descripcion INNER JOIN inmueble INNER JOIN fecha ON ID_Descripcion = ID_Fecha and ID_Descripcion = ID_Inmueble and ID_Inmueble= ".$id);
		return mysqli_fetch_row($respuesta);
	}
	function agregarCategoria($nombre,$ruta){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO categorias VALUES (NULL,'".$nombre."','".$ruta."')") or die (mysqli_error($conexion));
	}
	function eliminarCategoria($id){
		global $conexion;
		mysqli_query($conexion, "DELETE
									FROM categorias
									WHERE ID_Categoria=".$id) or die (mysqli_error('Error: '.$conexion));
	}


	function publicar($usuario, $telefono, $latitud, $longitud, $pos){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO inmueble
									VALUES(NULL,
											'".$usuario."',
											'".$latitud."',
											'".$longitud."',
											'".$pos."',
											'".$telefono."')");
	}

	function publicarDescripcion($usuario, $descripcionInm, $nombreInm, $precio, $direccion){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO descripcion
									VALUES (NULL, '".$usuario."',
									'".$nombreInm."',
									 $precio,
									  '".$descripcionInm."', '".$direccion."')");
	}

    function publicarFecha($usuario){
        global $conexion;
        mysqli_query($conexion, "INSERT INTO fecha values (null,'".$usuario."',CURDATE(),CURTIME())");


    }

	function subirEvento($nombre,$descripcion,$img){
		global $conexion;
		mysqli_query($conexion, "INSERT INTO eventos
								VALUES(NULL,'".$nombre."','".$descripcion."','".$img."')") or die (mysqli_error('Error: '.$conexion));
	}

	function getEvento(){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT nombre,descripcion,img
												FROM eventos");
		return $respuesta;
	}


	function getUsuarios(){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT *
												FROM usuarios
												WHERE admin<>1") or die (mysqli_error('Error: '.$conexion));
		//return $respuesta->fetch_all();
		return $respuesta;
	}

	function getBusqueda($busqueda){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT descripcion, nombre, telefono, correo
												FROM descripcioninmueble DI
												JOIN inmueble INM ON DI.ID_Des_Inmueble = INM.ID_Inmueble
												WHERE nombre LIKE '%$busqueda%'
												OR descripcion LIKE '%$busqueda%'") or die (mysqli_error('Error: '.$conexion));
		if(mysqli_fetch_assoc($respuesta)){
			return $respuesta->fetch_all();
		}else{
			echo "<h4 class = 'mediano condensed'> No se encontraron resultados con el termino ".'<b>'.$busqueda.'<b>'."</h4>";
		}
	}

	function validarLogin($usuario,$clave){
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario ='".$usuario."'AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion, $consulta);

		if($fila = mysqli_fetch_row($respuesta)){
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['admin'] = $fila[2];
			return true;
		}
		return false;
	}

	function eliminarPermisos($usuario){
		global $conexion;
		mysqli_query($conexion, "UPDATE usuarios
									SET catUno = null,
										catDos = null,
										catTres = null,
										catCuatro = null,
										catCinco = null,
										catSeis = null
									WHERE usuario = '".$usuario."'")
									or die (mysqli_error('Error: '.$conexion));
	}
	function asignarPermisos($usuario,$idCat){
		global $conexion;
		mysqli_query($conexion, "UPDATE usuarios
									SET
										catUno = if ($idCat = 1, 1, catUno /** Condicion, valor a tomar, celda del dato**/),
										catDos = if ($idCat = 2, 2, catDos ),
										catTres = if($idCat = 3, 3, catTres ),
										catCuatro = if($idCat = 4, 4, catCuatro),
										catCinco = if($idCat = 5, 5, catCinco),
										catSeis = if($idCat = 6, 6, catSeis)
									WHERE usuario = '".$usuario."';")
									or die (mysqli_error('Error: '.$conexion));
	}
	function tienePermiso($usuario,$idCat){
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT count(*) as total
												FROM ( select catUno, catDos, catTres, catCuatro, catCinco, catSeis
													from usuarios U
													where U.usuario = '".$usuario."'
													and (U.catUno= $idCat
														or U.catDos = $idCat
														or U.catTres = $idCat
														or U.catCuatro = $idCat
														or U.catCinco = $idCat
														or U.catSeis = $idCat
														)
													) as res;");
		$row = mysqli_fetch_assoc($respuesta);
		$numero = $row['total'];
		return $numero > 0;
	}



	function haIniciadoSesion(){
		session_start();
		return isset($_SESSION['usuario']);
	}

	function esAdmin(){
		return $_SESSION['admin'];
	}

	function desconectar(){
		global $conexion;
		mysqli_close($conexion);
	}
?>
