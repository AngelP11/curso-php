<?php
/*
Vamos a hablar sobre un patrón de diseño que se llama Front Controller. Como ustedes han visto en muchas de las páginas que hemos hecho hemos tenido que reutilizar mucho código. Esto implica que si queremos agregar algo a todas las páginas de nuestro sitio, tendremos que ir página por página agregando lo mismo en cada página.

El Front Controller es como tener un solo controlador que recibe todas las peticiones de nuestra aplicación web. Este controlador se debe hacer cargo de todo el flujo que es común para toda nuestra aplicación. En este sentido, el front controlar nos va a ayudar a llevar al usuario hacia las páginas que necesitamos.

Introducción a Router

Recomendación: Cuando ustedes estén haciendo una aplicación y estén teniendo una necesidad específica es bueno que usen paquetes de terceros.

Es importante que consigan paquetes que sean reconocidos, que tengan comentarios y que se note que estén resolviendo los bugs constantemente.

¿Qué es PHPFig?
Es un grupo que busca generar estándares y colaboraciones entre diferentes proyectos en php. Si ingresamos a www.php-fig-org.com vamos a ver todos los estándares que se están creando para que podamos usar el código de los demás.

Dentro de las cosas que podemos usar con este sitio está el Auloading que es hacer carga automática de archivos en cuanto nosotros utilicemos las clases.

También se incluyen Interfaces para mejorar el desarrollo de nuestro código.

¿Qué es Composer?
Composer nos brinda un sistema de manejo de dependencias que nos ayudará a manejar librerías de terceros.

PAQUETES UTILIZADOS: https://packagist.org/

Enrutador: Phroute (composer require phroute/phroute)
ORM para los Modelos: Eloquent (composer require illuminate/database)
Motor de templates: Twig (composer require twig/twig)
Manejador de variables de entorno: Dotenv (composer require vlucas/phpdotenv)
Validador de formularios: Validation (composer require siriusphp/validation) 
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
session_start();
//include_once '../config.php';

use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

//Configuramos eloquent
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

/*function render ($fileName, $params = []) {
	ob_start();
	extract($params);
	include $fileName;
	return ob_get_clean();
}*/

//Filtros
$router->filter('auth', function () {
	if (!isset($_SESSION['userId'])) {
		header('Location:' . BASE_URL . 'auth/login');
		return false;
	}
});

//Rutas 
$router->controller('/', App\Controllers\IndexController::class);
$router->controller('/auth', App\Controllers\AuthController::class);

$router->group(['before' => 'auth'], function ($router) {
	$router->controller('/admin', App\Controllers\Admin\IndexController::class);
	$router->controller('/admin/posts', App\Controllers\Admin\PostsController::class);
	$router->controller('/admin/users', App\Controllers\Admin\UserController::class);
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;

/*switch ($route) {
	case '/':
		require '../index.php';
		break;
	case '/admin':
		require '../admin/index.php';
		break;
	case '/admin/posts':
		require '../admin/posts.php';
		break;
}*/
