<?php 
	require_once 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM users WHERE id=:id";
	$query = $pdo->prepare($sql);

	$query->execute([
		'id' => $id
	]);

	header("Location:list.php"); //Este metodo, lo que hace es enviar encabezados en nuestra respuesta, en este caso estamos redireccionando a list.php
?>