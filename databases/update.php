<?php
	require_once 'config.php';

	if (!empty($_POST)) {
		$id = $_POST['id'];
		$newName = $_POST['name'];
		$newEmail = $_POST['email'];

		$sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
		$query = $pdo->prepare($sql);

		$result = $query->execute([
			'id' => $id,
			'name' => $newName,
			'email' => $newEmail
		]);

		$nameValue = $newName;
		$emailValue = $newEmail;
	} else {
		$id = $_GET['id'];

		$sql = "SELECT * FROM users WHERE id=:id";
		$query = $pdo->prepare($sql);

		$query->execute([
			'id' => $id
		]);

		$row = $query->fetch(PDO::FETCH_ASSOC);

		$nameValue = $row['name'];
		$emailValue = $row['email'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Databases - Update</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Update User</h1>
			<a href="list.php">Back</a>
			<br><br>
			
			<?php 
				if ($result) {
					echo '<div class="alert alert-success">Datos actualizados</div>';
				}
			?>

			<form action="update.php" method="POST">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" value="<?php echo $nameValue; ?>">
				<br>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $emailValue; ?>">
				<br>
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<input class="btn btn-success" type="submit" value="Update">
			</form>
		</div>
	</body>
</html>