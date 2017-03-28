<?php 
	require '../controller/funciones.php';
	if(!haIniciadoSesion()){
		header('Location: ../index.php');
	}
	conectar();
	$categorias = getCategoriasPorUser();
	desconectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
</head>
<body>
	<h1>Este es el panel del usuario</h1>
}
	
</body>
</html>