<?php 
	/*$var2 = 1;

	$var1 = function () use($var2) {
		echo 'This is a closures <br>';
		echo 'Value: ' . $var2;
	};

	$var1();*/

	$numbers = [1, 2, 3, 4, 5];

	$result = array_map(function ($n) {
		return $n * 2;
	}, $numbers);

	var_dump($result);
?>