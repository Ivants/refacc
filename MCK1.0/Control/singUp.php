<?php 
	require 'funciones.php';
	require '../Model/usuario.class.php';

	//Verificamos que el metodo POST tenga valores
	if(	isset($_POST['user']) &&
        isset($_POST['name']) &&
		isset($_POST['email']) &&
		isset($_POST['password']) &&
		isset($_POST['verifyPassword'])){

		if ($_POST['password'] == $_POST['verifyPassword']) {
			$usuario = $_POST['user'];
			$nombre = $_POST['name'];
			$correo = $_POST['email'];
			$clave = $_POST['password'];
			$admin = 0;


			conectar();
			$user = new usuario($usuario,$clave,$nombre,$correo,$admin);
			validarLogin($usuario,$clave);
			header('Location: ../View/usuario.php');
		}else{
			?>
			<script>
				alert('Las claves no coinciden');
				window.location.replace('../index.html').getElementById('myNav2');
			</script>
			<?php
		}
	} else{
		?>
		<script>
			alert('Campos vacios');
		</script>
		<?php
	}
?>





















 ?>