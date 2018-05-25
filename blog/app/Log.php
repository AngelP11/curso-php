<?php 
/*
Guardando un Log de Errores en el Servidor

En este video hablamos sobre los los que son registros de datos que guardamos con el fin de tomar acciones sobre ellos.

Un ejemplo de esto es guardar archivos de nuestros errores, también podemos guardar información sobre usuarios que intentan acceder a información confidencial, etc.
*/

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log {
	private static $_logger = null;

	private static function getLogger () {
		if (!self::$_logger) {
			self::$_logger = new Logger('App Log');
		}

		return self::$_logger;
	}

	public static function logError ($error) {
		self::getLogger()->pushHandler(new StreamHandler('../logs/application.log', Logger::ERROR));
		self::getLogger()->addError($error);
	}

	public static function logInfo ($info) {
		self::getLogger()->pushHandler(new StreamHandler('../logs/application.log', Logger::INFO));
		self::getLogger()->addInfo($info);
	}
}