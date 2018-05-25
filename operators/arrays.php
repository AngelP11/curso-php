<?php 
	$array1 = [
		0 => 'a',
		1 => 'b',
		2 => 'c'
	];

	$array2 = ['a', 'b', 'c'];

	$result = $array1 + $array2;

	var_dump($array1 === $array2);
?>