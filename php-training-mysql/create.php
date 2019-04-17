<?php
	// Connect from connect.php file
	require_once('connect.php');

	// Insert data
	if (isset($_POST['button']) && !empty($_POST))
	{
		try {
			$hname = $_POST['hname'];
			$difficulty = $_POST['difficulty'];
			$distance = $_POST['distance'];
			$duration = $_POST['duration'];
			$height_difference = $_POST['height_difference'];
			$available = $_POST['available'];
		
			$data = [
				'hname' 		=> $hname,
				'difficulty' 	=> $difficulty,
				'distance' 		=> $distance,
				'duration' 		=> $duration,
				'height_difference' => $height_difference,
				'available'		=> $available
			];
		
			$sqlInsert = "INSERT INTO hiking (hname, difficulty, distance, duration, height_difference, available) VALUES (:hname, :difficulty, :distance, :duration, :height_difference, :available)";
		
			$sqlExec = $pdo->prepare($sqlInsert);
			$sqlExec->execute($data);
			
			header('Location: read.php?create');
		}
		catch(PDOException $e){
			echo 'Error: '. $e->getMessage();
		}
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
			<label for="hname">Name</label>
			<input type="text" name="hname" value="">
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
			<input type="number" name="distance" value="">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="number" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Height difference</label>
			<input type="number" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Available</label>
			<select name="available">
				<option value=0>no</option>
				<option value=1>yes</option>
			</select>
		</div>
		<button type="submit" name="button">Send</button>
	</form>
</body>
</html>