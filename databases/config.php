<?php 
/*
Es importante recalcar que PDO tiene tres formas de manejar los errores mediante excepciones:

$dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_SILENT);
$dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_WARNING);
$dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);

No importa el modo de error que hayas escogido, este siempre lanzará una excepción, por eso siempre se usa el try/catch.

PDO::ERRMODE_SILENT. Es el modo de error por defecto. Si se deja así habrá que comprobar los errores de forma parecida a como se hace con mysqli. Se tendrían que emplear PDO::errorCode() y PDO::errorInfo() o su versión en PDOStatement PDOStatement::errorCode() y PDOStatement::errorInfo().

PDO::ERRMODE_WARNING. Además de establecer el código de error, PDO emitirá un mensaje E_WARNING. Modo empleado para depurar o hacer pruebas para ver errores sin interrumpir el flujo de la aplicación.

PDO::ERRMODE_EXCEPTION. Además de establecer el código de error, PDO lanzará una excepción PDOException y establecerá sus propiedades para luego poder reflejar el error y su información. Este modo se emplea en la mayoría de situaciones, ya que permite manejar los errores y a la vez esconder datos que podrían ayudar a alguien a atacar tu aplicación.
*/

	$dbHost = 'localhost';
	$dbName = 'cursophp';
	$dbUser = 'root';
	$dbPass = '26973456';

	try {
		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //cada vez que haya un error, nos aseguramos que lanze una exception y no empieze amostrar errores por ahi sin control el muy...
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>