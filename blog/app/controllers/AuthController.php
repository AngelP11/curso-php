<?php

namespace App\Controllers;

use App\Log;
use App\Models\User;
use Sirius\Validation\Validator; 

class AuthController extends BaseController {
	public function getLogin () {
		return $this->render('login.twig');
	}

	public function postLogin () {
		$errors = [];

		$validator = new Validator();

		$validator->add('email', 'required');
		$validator->add('email', 'email');

		$validator->add('password', 'required');

		if ($validator->validate($_POST)) {
			$user = User::where('email', $_POST['email'])->first(); //Buscamos el usuario

			if ($user) {
				if (password_verify($_POST['password'], $user->password)) { //Si exsite comparamos las conraseñas 
					//TODO OK
					$_SESSION['userId'] = $user->id;
					Log::logInfo('Login User: ' . $user->id); //Mandamos un Log cada vez que loguee un usuario
					header('Location:' . BASE_URL . 'admin');
					return null;
				}
			}
			//NADA OK 
			$validator->addMessage('email', 'Username and/or password does not match');
		}

		$errors = $validator->getMessages();

		return $this->render('login.twig', ['errors' => $errors]);
	}

	public function getLogout () {
		//Eliminamos la sesion
		Log::logError('Logout User: ' . $_SESSION['userId']);
		unset($_SESSION['userId']);
		header('Location:' . BASE_URL . 'auth/login');
	}
}