<?php 
/*
Require: Establece que el código que estas importando es absolutamente requerido, es decir, es vital para el funcionamiento de tu programa, es por ello que si el archivo especificado en la función require() no se encuentra o contiene algún error php arrojará un “Fatal Error” y la ejecución se detendrá.

Include: Por el contrario, si existe algún error en el código o el archivo no se encuentra php solo mostrará un “Warning” y programa seguirá ejecutandose. (Hay que ser cauteloso con esto, ya que si el archivo que estas incluyendo es vital para el funcionamiento del programa no sé ejecutará de la manera adecuada).

include_once & require_once: funcionan de la misma forma que include y require, salvo que a utilizar la version _once se impide la carga de un mismo archivo más de una vez, esto nos permite evitar errores de redeclaración de variables, funciones o clases (Es importante saber que el uso de estas versiones son mucho más pesadas y consumen más recursos, por lo que es recomendable utilizarlas solo cuándo sea necesario).
*/
	include_once 'functions.php'; //Solo te dara una abvertencia y continuara con la ejecucion, en el caso que el archivo no exista.
	//require_once 'functions.php'; // Generara un error fatal

	echo '<p>Text from index.php</p>';
	suma(32, 67);
?>