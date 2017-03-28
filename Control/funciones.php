<?php
	$conexion=null;

	function conectar(){
		global $conexion;
		$conexion =  mysqli_connect('localhost','root','UniX-21-21','erp');
		if (mysqli_connect_errno()){
			//echo "Error en la conexión: " . mysqli_connect_error();
		} else{
			//echo "conexion exitosa";
		}
			mysqli_set_charset($conexion,'utf8');
	}


	function validarLogin($usuario,$clave){
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario ='".$usuario."'AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion, $consulta);

		if($fila = mysqli_fetch_row($respuesta)){
			session_start();
			$_SESSION['usuario'] = $fila[0];
			$_SESSION['admin'] = $fila[4];
			return true;
		}
		return false;
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
