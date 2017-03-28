<?php 
	require 'funciones.php';

	$usuario = $_POST['user'];
	$pass = $_POST['password'];

	echo "el usuario es ".$usuario;
	echo "la contraseña del usuario ". $usuario . " es ".$pass;

	conectar();

	if(validarLogin($usuario,$pass)){
	//accedemos al sistema verificando si es usuario o administrador
		if(esAdmin()){
			header('Location: ../View/administrador.php');
		}else{
			header('Location: ../View/usuario.php');
		}
	} else {
	//Si no volvemos a formulario inicial
?>

<script>
	location.href = "../index.html";
</script>

<?php
	desconectar();
	}
 ?>