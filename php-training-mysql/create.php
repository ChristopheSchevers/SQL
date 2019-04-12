<?php
// Connect from connect.php file
include('connect.php');

// Insert data
if (isset($_POST['button']) & !empty($_POST))
{
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = $_POST['duration'];
	$heightdiff = $_POST['height_difference'];

	$data = [
		':name' => $name,
		':difficulty' => $difficulty,
		':distance' => $distance,
		':duration' => $duration,
		':height_difference' => $heightdiff
	];

	$sqlInsert = "INSERT INTO `hiking` (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES ($name, $difficulty, $distance, $duration, $heightdiff)";

	$sqlExec = $pdo->prepare($sqlInsert);
	$sqlExec->execute($data);

	header("Location: create.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add a Hike</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Datalist</a>
	<h1>Add</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulty</label>
			<select name="difficulty">
				<option value="very easy">Very easy</option>
				<option value="easy">Easy</option>
				<option value="medium">Medium</option>
				<option value="hard">Hard</option>
				<option value="very hard">Very hard</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="text" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Height difference</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Send</button>
	</form>
</body>
</html>