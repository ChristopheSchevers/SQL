<?php
// User data variables
$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'reunion_island';

// Connect
try 
{
  $pdo = new PDO("mysql:host=$servername; dbname=$db; charset=utf8mb4",$username, $password);
}
catch(PDOException $e)
{
  die ("Connection failed: ". $e->getMessage());
}

// Get data
$sql = "SELECT * FROM hiking";
$q = $pdo->query($sql);

$q->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hikes</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>List of Hikes</h1>
    <table>
      <thead>
        <th>Name</th>
        <th>Difficulty</th>
        <th>Distance(km)</th>
        <th>Duration(min)</th>
        <th>Height Difference(m)</th>
      </thead>
      <tbody>
        <?php while ($row = $q->fetch()): ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['difficulty']; ?></td>
            <td><?php echo $row['distance']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['height_difference']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </body>
</html>