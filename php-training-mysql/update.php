<?php
	// Get passed id
	$id = $_GET['id'];

	// Connect from connect.php file
	include('connect.php');

	// Fetched data from DB based on id
	$sql = "SELECT * FROM hiking WHERE ID = :ID";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':ID'=>$id]);

	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$hname = $row['hname'];
		$difficulty = $row['difficulty'];
		$distance = $row['distance'];
		$duration = $row['duration'];
		$height_difference = $row['height_difference'];
	}

	// Update data
	if(isset($_GET['button'])) {		
		$new_hname = $_POST['hname'];
		$new_difficulty = $_POST['difficulty'];
		$new_distance = $_POST['distance'];
		$new_duration = $_POST['duration'];
		$new_height_difference = $_POST['height_difference'];
		
		$data = [
			'hname' 		=> $new_hname,
			'difficulty' 	=> $new_difficulty,
			'distance' 		=> $new_distance,
			'duration' 		=> $new_duration,
			'height_difference' => $new_height_difference
		];
		
		$sqlUpdate = "UPDATE hiking SET hname = :hname, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE ID = :ID";
		
		$upstmt = $pdo->prepare($sqlUpdate);
		$upstmt->execute($data);

		header('Location: read.php?update');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit a hike</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Datalist</a>
	<h1>Edit</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="hname" value="<?php echo $hname ?>">
		</div>

		<div>
			<label for="difficulty">Difficulty</label>
			<select name="difficulty">
				<option value="very easy" <?php if($difficulty == 'very easy'){echo 'selected';} ?>>Very easy</option>
				<option value="easy" <?php if($difficulty == 'easy'){echo 'selected';} ?>>Easy</option>
				<option value="medium" <?php if($difficulty == 'medium'){echo 'selected';} ?>>Medium</option>
				<option value="hard" <?php if($difficulty == 'hard'){echo 'selected';} ?>>Hard</option>
				<option value="very hard" <?php if($difficulty == 'very hard'){echo 'selected';} ?>>Very hard</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance ?>">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="duration" name="duration" value="<?php echo $duration ?>">
		</div>
		<div>
			<label for="height_difference">Height difference</label>
			<input type="text" name="height_difference" value="<?php echo $height_difference ?>">
		</div>
		<button type="submit" name="button">Send</button>
	</form>
</body>
</html>