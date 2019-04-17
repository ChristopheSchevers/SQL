<?php
	// Get passed id
	$id = $_GET['id'];

	// Connect from connect.php file
	require_once('connect.php');
	
	try{
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
			$available = $row['available'];
		}
	}
	catch(PDOException $e){
		echo 'Error: '. $e->getMessage();
	}
	
	// Update data
	if(isset($_POST['button']) && !empty($_POST)) {		
		try {
			$hname = $_POST['hname'];
			$difficulty = $_POST['difficulty'];
			$distance = $_POST['distance'];
			$duration = $_POST['duration'];
			$height_difference = $_POST['height_difference'];
			$available = $_POST['available'];

			$update = [
				'ID' 	=> $id,
				'hike' 	=> $hname,
				'diff' 	=> $difficulty,
				'dist' 	=> $distance,
				'dur' 	=> $duration,
				'h_diff' => $height_difference,
				'avail'	=> $available
			];

			$upsql = "UPDATE hiking SET hname=:hike, difficulty=:diff, distance=:dist, duration=:dur, height_difference=:h_diff, available=:avail WHERE ID=:ID";
			$upstmt = $pdo->prepare($upsql);
			$upstmt->execute($update);

			header('Location: read.php?update');
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
			<input type="number" name="distance" value="<?php echo $distance ?>">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="number" name="duration" value="<?php echo $duration ?>">
		</div>
		<div>
			<label for="height_difference">Height difference</label>
			<input type="number" name="height_difference" value="<?php echo $height_difference ?>">
		</div>
		<div>
			<label for="available">Available</label>
			<select name="available">
				<option value=0 <?php if($available == O){echo 'selected';} ?>>no</option>
				<option value=1 <?php if($available == O){echo 'selected';} ?>>yes</option>
			</select>
		</div>
		<button type="submit" name="button">Send</button>
	</form>
</body>
</html>