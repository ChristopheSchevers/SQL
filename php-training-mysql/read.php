<?php
  include('connect.php');

  // Get data
  try{
    $sql = "SELECT * FROM hiking";
    $q = $pdo->query($sql);
  
    $q->setFetchMode(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e){
    echo 'Error: '. $e->getMessage();
  }

  if(isset($_GET['create'])){
    $message = "Hike added to list!";
    echo $message;
  }

  if(isset($_GET['update'])){
    $message = "Hike updated!";
    echo $message;
  }

  if(isset($_GET['delete'])){
    $message = "Hike deleted successfully!";
    echo $message;
  }
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
            <td><?php echo $row['hname']; ?></td>
            <td><?php echo $row['difficulty']; ?></td>
            <td><?php echo $row['distance']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['height_difference']; ?></td>
            <td><a href="update.php?id=<?php echo $row['ID'] ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row['ID'] ?>">Delete</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </body>
</html>