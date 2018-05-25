<?php 
/*
PHP en si mismo no usa arreglos, sino mapas ordenados, que funcionan con una logica de llave(key) valor(value). Ejemplo:
*/
	//Forma comun de declarar un array
	//$arrayVar = ['red', 'blue', 'green'];

	//Lo que realmente hace PHP
	/*$arrayVar = [
		0 => 'red',
		1 => 'blue',
		2 => 'green'
	];*/

	$arrayVar = [
		'color1' => 'red',
		'color 2' => 'blue',
		2 => 'green'
	];

	var_dump($arrayVar['color1']);
?>