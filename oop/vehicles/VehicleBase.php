<?php 
/*
Por un tema de principios de la POO los atributos de los objetos deben ser siempre “privados” (concepto “encapsulación”: no son accesibles desde fuera del objeto, solo el objeto tiene la potestad de usarlos directamente) y se deberán crear métodos públicos que sustituya una u otra operación, o ambas, cada vez que la situación lo amerite: un método “setter” para “cargar un valor” (asignar un valor a una variable) y/o un método “getter” para “retornar el valor” (solo devolver la información del atributo para quién la solicite).

Una clase abstracta es como una clase parcialmente construida. El tipo de clases definidas como abstractas, si una clase contiene al menos un método abstracto debe ser definida como una clase abstracta.
*/

	namespace Vehicles;

	abstract class VehicleBase {
		//Atributos
		protected $owner;
		public $brand;

		//Metodos
		public function __construct ($owner) {
			$this->owner = $owner;
		}

		public function move () {
			echo $this->startEngine();
			echo 'Moving ' . $this->brand . '<br><br>';
		}

		public function setOwner ($owner) {
			$this->owner = $owner;
		}

		public function getOwner () {
			return $this->owner;
		}

		public abstract function startEngine(); //Cuando definimos un metodo abstracto estamos obligando a que todas las clases que herenden esta clase implemente este metodo.

		/*public function __destruct () {
			echo 'Destruct <br>';
		}*/
	}
?>