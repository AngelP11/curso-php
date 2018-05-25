<?php 
	require_once 'config.php';

	$user = null;
	$query = null;

	if (!empty($_POST)) {
		//NO hacer, esto hace que nuestra aplicacion sea propensa a SQL Injections
		$query = "SELECT * FROM users WHERE email='" . $_POST['email'] . "' AND password='" . md5($_POST['password']) ."'";
		$queryResult = $pdo->query($query);

		$user = $queryResult->fetch(PDO::FETCH_ASSOC);

		//Siempre usar las etiquetas :tag
		/*$query = "SELECT * FROM users WHERE email=:email AND password=:password";
		$prepared = $pdo->prepare($query);

		$prepared->execute([
			'email' => $_POST['email'],
			'password' => md5($_POST['password'])
		]);

		$user = $prepared->fetch(PDO::FETCH_ASSOC);*/
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Databases - Fake Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Fake Login</h1>
			<a href="index.php" title="">Home</a>
			<br><br>

			<form action="fake-login.php" method="POST">
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<br>
				<label for="pass">Password</label>
				<input type="password" name="password" id="pass">
				<br>

				<input class="btn btn-primary" type="submit" value="Login">
			</form>
			
			<br><br>

			<h2>Query</h2>
			<div>
				<?php 
					print_r($query);
				?>
			</div>

			<h2>User Data</h2>
			<div>
				<?php 
					print_r($user);
				?>
			</div>
		</div>
	</body>
</html>