<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostsController extends BaseController {
	public function getIndex () {
		//Ruta: admin/posts
		
		//Usando PDO
		/*global $pdo;

		$query = $pdo->prepare("SELECT * FROM blog_posts ORDER BY id DESC");
		$query->execute();

		$blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);*/

		//Usando Eloquent
		$blogPosts = BlogPost::all();
		return $this->render('admin/posts.twig', ['blogPosts' => $blogPosts]);
	}

	public function getDetails ($id) {
		$blogPost = BlogPost::find($id);
		return $this->render('admin/details-post.twig', ['blogPost' => $blogPost]);
	}

	public function getEdit ($id) {
		$blogPost = BlogPost::find($id);
		return $this->render('admin/edit-post.twig', ['blogPost' => $blogPost]);
	}

	public function postEdit ($id) {
		$result = false;
		$errors = [];

		$validator = new Validator();

		$validator->add('title', 'required');
		$validator->add('content', 'required');

		if ($validator->validate($_POST)) {
			$blogPost = BlogPost::find($id);

			$blogPost->title = $_POST['title'];
			$blogPost->img_url = $_POST['img_url'];
			$blogPost->content = $_POST['content'];

			$blogPost->save();

			$result = true;
		} else {
			$errors = $validator->getMessages();
		}

		return $this->render('admin/edit-post.twig', [
			'result' => $result,
			'errors' => $errors
		]);
	}

	public function getCreate () {
		//Ruta: admin/posts/create (Method GET)
		return $this->render('admin/insert-post.twig');
	}

	public function postCreate () {
		//Ruta: admin/posts/create (Method POST)
		$result = false;
		$errors = [];

		$validator = new Validator();
		$validator->add('title', 'required');
		$validator->add('content', 'required');
		
		if ($validator->validate($_POST)) {
			$title = $_POST['title'];
			$content = $_POST['content'];

			//Usando Eloquent
			$blogPosts = new BlogPost([
				'title' => $title,
				'content' => $content
			]);

			if ($_POST['img_url']) {
				$blogPosts->img_url = $_POST['img_url'];
			}

			$blogPosts->save();

			$result = true;
		} else {
			$errors = $validator->getMessages();
		}
		
		//Usando PDO
		/*global $pdo;

		$sql = "INSERT INTO blog_posts(title, content) VALUES (:title, :content)";
		$query = $pdo->prepare($sql);

		$result = $query->execute([
			'title' => $title,
			'content' => $content
		]);*/

		return $this->render('admin/insert-post.twig', [
			'result' => $result,
			'errors' => $errors
		]);
	}

	public function getDestroy ($id) {
		$blogPost = BlogPost::destroy($id);
		header('Location:' . BASE_URL . 'admin/posts');
	}
}