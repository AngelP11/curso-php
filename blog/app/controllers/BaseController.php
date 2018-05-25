<?php 
/*
¿Qué son los motores de templates?

Los motores de templates son librerías que tienen como único propósito formatearlo datos y generar HTML.

¿Para qué existen motores de template en php si php es prácticamente un motor de templates?

Php no ha evolucionado tanto hacia la parte de motor de templates.
Los motores de templates nos obligan a utilizar otra sintaxis lo que hace que nuestras vistas no estén procesando datos.
Nos da la posibilidad de tener herencia de templates, etc.

Instalación y configuración de Twig

Vamos a instalar un motor de template twig, vamos de nuevo a https://packagist.org/ en donde tendremos la documentación de Twig.

En esta sección vamos a cambiar la forma en la que estamos renderiando y vamos a crear una nueva forma dentro de nuestros controladores.

Aquí encontraremos información sobre cómo instalar twit y cómo funciona para cada sistema operativo.
*/

namespace App\Controllers;

class BaseController {
	protected $templateEngine;

	public function __construct () {
		$loader = new \Twig_Loader_Filesystem('../views');
		$this->templateEngine = new \Twig_Environment($loader, [
			'debug' => true,
			'cache' => false
		]);
		$this->templateEngine->addFilter(new \Twig_SimpleFilter('url', function ($path) {
			return BASE_URL . $path;
		}));
	}

	public function render ($fileName, $data = []) {
		return $this->templateEngine->render($fileName, $data);
	}
}