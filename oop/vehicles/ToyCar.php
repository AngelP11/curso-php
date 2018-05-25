<?php 
	namespace Vehicles;
	require_once 'VehicleBase.php';

	class ToyCar extends VehicleBase {
		public function move () {
			self::startEngine();
			echo 'Car: Moving ' . $this->brand . '<br><br>';
		}

		public function startEngine () {
			throw new \Exception("Engine not found", 1);
		}
	}
?>