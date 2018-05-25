<?php 
	include 'vehicles/Car.php';
	include 'vehicles/Truck.php';
	include 'vehicles/ToyCar.php';

	use Vehicles\{Car, Truck, ToyCar}; //PHP 7 
	//use Vehicles\Truck;

	//$car->setOwner('Angel');
	//$car2->setOwner('Valentina');

	echo '<h1>Class Car</h1>';
	$car = new Car('Angel');
	$car->brand = 'Fiat';
	echo 'Owner ' . $car->brand . ': ' . $car->getOwner() . '<br>';
	$car->move();
	echo 'GPS POS: ' . $car->getPos();

	echo '<h1>Class Truck 1</h1>';
	$truck1 = new Truck('Elias', 'Pickup');
	$truck1->brand = 'Toyota';
	echo 'Owner ' . $truck1->brand . ': ' . $truck1->getOwner() . '<br>';
	$truck1->move();
	
	echo '<h1>Class Truck 2</h1>';
	$truck2 = new Truck('Alejandro', 'Pickup');
	$truck2->brand = 'Ford';
	echo 'Owner ' . $truck2->brand . ': ' . $truck2->getOwner() . '<br>';
	$truck2->move();

	try {
		echo '<h1>Class ToyCar</h1>';
		$toyCar = new ToyCar('Sebastian');
		$toyCar->move();
	} catch (Exception $e) {
		echo '<p>This is a toy</p>';
	} finally { //Este bloque se ejecuta se cumpla o no la excepcion.
		echo 'Finally';
	}
	

	echo '<br>Total Trucks: ' . Truck::getTotal();

	$ser = serialize($car);
	$newCar = unserialize($ser);

	echo 'newCar Owner: ' . $newCar->getOwner() . '<br>';


?>