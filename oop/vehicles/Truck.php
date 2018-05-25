<?php 
/*
Static

Definir propiedades o métodos estáticos nos permiten crear métodos y propiedades que son accesibles sin la necesidad de instanciar una clase. Pero recuerden que estos métodos no serán únicos para cada instancia, es decir que si ustedes de alguna forma modifican la propiedad estática, esta será cambiada para todos los objetos.
*/

	namespace Vehicles;
	require_once 'VehicleBase.php';

	class Truck extends VehicleBase {
		//Atributos
		private static $count = 0;
		private $type;

		//Metodos
		public function __construct ($owner, $type) {
			//parent::__construct($owner);
			$this->owner = $owner;
			$this->type = $type;
			self::$count++;
		}
		/*public function move () {
			echo 'Truck ' . $this->type . ': Moving ' . $this->brand . '<br>';
		}*/

		public static function getTotal () {
			return self::$count;
		}

		public function startEngine () {
			return 'Truck: Star engine ';
		}

	}
?>