<?php 
/*
Los operadores de comparación, como su nombre lo indica, toman dos valores, los comparan y nos regresan un valor extra como resultado.

Tipos de operadores de comparación:

1. ==
Obtendremos un true en caso de que los valores sean iguales y un false en caso de que los valores sean diferentes.

2. ===
Verifica que los valores sean completamente idénticos, tanto en valor como en tipo de dato.

3. !=
Verifica si los valores son diferentes.
True si los valores son diferentes y false si los valores son iguales.

4. <=>
Permite comparar si dos valores son: menor, igual o mayor. Esto en una sola operación.
*/

	$v1 = 10;
	$v2 = 10;

	$result = $v1 <=> $v2; // -1 -> Si el primer valor es menor que el segundo, 0 -> Si los valores son iguales y 1 -> Si el primero es mayor que el segundo.
	var_dump($result);
?>