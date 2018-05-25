<?php 
	require_once 'config.php';

	if (!empty($_POST)) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
		$query = $pdo->prepare($sql);

		$result = $query->execute([
			'name' => $name,
			'email' => $email,
			'password' => $password
		]);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Databases - Add</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Add User</h1>
			<a href="index.php" title="">Home</a>
			<br><br>
			
			<?php 
				if ($result) {
					echo '<div class="alert alert-success">Registro exisitoso</div>';
				}
			?>

			<form action="add.php" method="POST">
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<br>
				<label for="pass">Password</label>
				<input type="password" name="password" id="pass">
				<br>

				<input class="btn btn-success" type="submit" value="Save">
			</form>
		</div>
	</body>
</html>