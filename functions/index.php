<?php
	function saludar ($name) {
		echo "Hello $name";
		echo '<br>';
	}

	saludar('Angel');
	saludar('Alicia');

	function suma ($a, $b) {
		return $a + $b;
	}

	$c = suma(122, 8);
	var_dump($c);
?>