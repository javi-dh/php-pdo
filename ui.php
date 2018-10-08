<?php
	require_once 'connection.php';

	$getMoviesByID = $conn->query("
		SELECT *
		FROM movies
		WHERE id = 13
	");

	$movieByIdResult = $getMoviesByID->fetch(PDO::FETCH_OBJ);

	$getAllMovies = $conn->query("
		SELECT *
		FROM movies
		ORDER BY title
	");

	$allMoviesResult = $getAllMovies->fetchAll(PDO::FETCH_ASSOC);

	$totalMovies = $getAllMovies->rowCount();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Movies</title>
</head>
<body>
	<h2>Título: <?php echo $movieByIdResult->title;  ?> </h2>
	<h3>Rating: <?= $movieByIdResult->rating; ?> </h3>
	<h4>Awards: <?= $movieByIdResult->awards; ?> </h4>
	<hr>
	<h3>Cantidad total de películas : <?php echo $totalMovies; ?></h3>
	<ul>
		<?php foreach ($allMoviesResult as $oneMovie): ?>
			<li> <?php echo $oneMovie['title'] ?> </li>
		<?php endforeach; ?>
	</ul>
</body>
</html>
