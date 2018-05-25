<?php 
/*
Traits

Muchos lenguajes de programación orientada a objetos utilizan un modelo de herencia. En el que usen una funcionalidad llamada trait que nos permite agregar o extender la funcionalidad de una clase sin tener la limitante de la herencia.

Agrupan funcionalidades específicas, se puede considerar que estos son clases especiales que no pueden ser especialmente llamados, estos no pueden ser instanciados de ninguna forma.
*/
namespace Vehicles;

trait GPSTrait {
	public function getPos () {
		return 'Longitud, Latitud...';
	}
}
?>