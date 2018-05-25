<?php 
/*
Interfaces
 
"En una interfaz se definen habitualmente un juego de funciones que deben codificar las clases que implementan dicha interfaz. De modo que, cuando una clase implementa una interfaz, podremos estar seguros que en su código están definidas las funciones que incluía esa interfaz."

interface MyInterface {
	public function method1();
}

Php contiene unos métodos que se llaman serialización y deserialización los cuales permiten convertir un objeto en una especie de bloque que puede ser almacenado y después con otro método podemos hacer la operación inversa para obtener ese código.
*/

	namespace Vehicles;
	require_once 'VehicleBase.php';
	require_once 'GPSTrait.php';

	class Car extends VehicleBase implements \Serializable {
		use GPSTrait;

		/*public function move () {
			echo 'Car: Moving ' . $this->brand . '<br><br>';
		}*/

		public function startEngine () {
			return 'Car: Star engine ';
		}

		public function serialize () {
			echo '<br>Serialize<br>';
			return $this->owner;
		}

		public function unserialize($serialized) {
			echo 'Unserialize<br>';
			$this->owner = $serialized;
		}
	}
?>