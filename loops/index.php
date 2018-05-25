<?php 
	//Ciclo for
	/*for ($i = 0; $i <= 10; $i++) {
		echo $i . '<br>';
	}*/

	//Ciclo while
	/*$i = 11;
	while ($i <= 10) {
		echo $i . '<br>';
		$i++;
	}*/

	//Ciclo do-while
	/*$i = 11;
	do {
	   echo $i . '<br>';
	   $i++;
	} while ($i <= 10);*/

	$names = ['Carlos', 'Valentina', 'Angelica'];
	foreach ($names as $key => $name) {
		echo $key . " - " . $name . "<br>";
	}
?>