<?php
	require_once 'connection.php';

	if ( isset($_GET['searchQuery']) ) {
		$searchQuery = $_GET['searchQuery'];

		$query = $conn->query("
			SELECT *
			FROM movies
			WHERE title LIKE '%{$searchQuery}%'
		");

		$results = $query->fetchAll(PDO::FETCH_OBJ);
	}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Movies</title>
</head>
<body>
	<form class="" method="get">
		<input type="text" name="searchQuery">
		<button type="submit">Buscar</button>
	</form>

	<?php if (isset($searchQuery)): ?>
		<h2>Resultado de tu búsqueda:</h2>
		<?php if ( $results ): ?>
			<ul>
				<?php foreach ($results as $result): ?>
				<li> <?= $result->title; ?> </li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<p style="color: red;">No hay resultados</p>
		<?php endif; ?>
	<?php endif; ?>


</body>
</html>
