<?php 
	require_once 'config.php';

	$queryResult = $pdo->query("SELECT * FROM users");

	/*while ($row = $queryResult->fetch()) {
		var_dump($row);
	}*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Databases - List</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>List Users</h1>
			<a href="index.php" title="">Home</a>

			<br><br>
			
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($queryResult as $row): ?>
						<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["email"]; ?></td>
							<td>
								<a href="update.php?id=<?php echo $row["id"]; ?>">Actualizar</a>
								<a href="delete.php?id=<?php echo $row["id"]; ?>">Eliminar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>