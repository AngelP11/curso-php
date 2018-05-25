<?php 

/*
Vamos a continuar hablando sobre la refactorización del proyecto. En este vamos a hablar sobre el patrón MVC 1, que significa Model Vista Controlador. Este patrón de diseño es muy popular en Php y trata de ayudarnos a organizar mejor la estructura de nuestras aplicaciones. El patrón de diseño propone dividir nuestra aplicación en tres secciones:

Modelo
Controlador
Vista
El modelo es la parte más importante y la que contiene toda la lógica de negocio de nuestra aplicación.

La vista se encargará simplemente de despegar datos.

El controlador une el modelo y la vista.
*/

namespace App\Controllers;
use App\Models\BlogPost;

class IndexController extends BaseController {
	public function getIndex () {
		//Usando PDO 
		/*global $pdo;

		$query = $pdo->prepare("SELECT * FROM blog_posts ORDER BY id DESC");
		$query->execute();

		$blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);*/

		//Usando Eloquent
		$blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();

		return $this->render('index.twig', ['blogPosts' => $blogPosts]);
	}
}

