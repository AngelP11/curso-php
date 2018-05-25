<?php 
/*	
Diferencia entre comillas dobles y comillas simples:

Comillas simples (’’): El texto que se escriba dentro de estas se mostrara tal cual del lado del cliente.

Comillas dobles (""): El interprete de PHP tratara de evaluar la cadena para ver si se estan invocando caracteres de escape (\n) o si se llamando a una variable.

PHP es dinamicamente tipado, puedes convertir una variable entera a un string y viceversa.

PHP es debilmente tipado, puedes concatenar un string con un entero (en este caso el interprete de PHP tratara de convertir el entero en un string para asi poder realizar la operacion) y lo mis pasa cuando se quiere sumar o restar.
*/
	$intVar = 56;

	$stringVar = "Hola $intVar";
	echo $stringVar;
?>