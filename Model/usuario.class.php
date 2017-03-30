<?php

	$conexion=null;

	class usuario{

		public $usuario;
		public $clave;
		public $nombre;
		public $correo;
		public $admin;


		function __construct($usuario,$clave,$nombre,$correo,$admin){
			$this->registrarUsuarios($usuario,$clave,$nombre,$correo,$admin);
		}

		function registrarUsuarios($usuario,$clave,$nombre,$correo,$admin){
			global $conexion;
			mysqli_query($conexion, "INSERT INTO usuarios
										VALUES ('".htmlentities($usuario)."',
												'".htmlentities($clave)."',
												'".htmlentities($nombre)."',
												'".htmlentities($correo)."',
												$admin)")
			or die (mysqli_error($conexion));
		}

		function registrarDatosUsuario($usuario, $nombre,$correo){
			global $conexion;
			mysqli_query($conexion, "INSERT INTO datosP
										VALUES ('".htmlentities($usuario)."',
												'".htmlentities($nombre)."',
												'".htmlentities($correo)."') ")
			or die ("Eror consulta 2".mysqli_error($conexion));
		}

	}

?>
