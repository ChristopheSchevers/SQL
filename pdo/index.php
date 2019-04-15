<?php
// DB variables
$servername = "localhost";
$username = "root";
$password = "root";
$db = "weatherapp";

// Establish connection with DB
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$db;charset=utf8mb4", $username, $password);
}
catch(PDOException $e)
{
    die ("Connection failed: ". $e->getMessage());
}

// Insert data
if (isset($_POST['insert']))
{
    $city = $_POST['city'];
    $high = $_POST['high'];
    $low = $_POST['low'];

    $data = [
        'city' => $city,
        'high' => $high,
        'low' => $low,
    ];

    $sqlInsert = "INSERT INTO Weather (city, high, low) VALUES (:city, :high, :low)";

    $sqlExec = $pdo->prepare($sqlInsert);
    $sqlExec->execute($data);

    header("Location: index.php");
}

// Delete checked
$todelete = $_POST['delete-btn'];
$sqlDel = $pdo->prepare("DELETE FROM Weather WHERE id = ?");
foreach ($tdelete as $id)
    $sqlDel->execute($id);

// Get data
$sql = "SELECT * FROM Weather";
$q = $pdo->query($sql);

$q->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>WeatherApp</title>
    </head>
    <body>
        <div id="container">
            <h1>Weather</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>City</th>
                        <th>High</th>
                        <th>Low</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['city']); ?></td>
                            <td><?php echo htmlspecialchars($row['high']); ?></td>
                            <td><?php echo htmlspecialchars($row['low']); ?></td>
                            <td><input type="checkbox" name="deleterow[]" value=""></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <form method="post" action="">
                <input type="text" name="city" required="required">
                <input type="number" name="high" required="required">
                <input type="number" name="low" required="required">
                <input type="submit" name="insert" value="Submit">
                <input type="submit" name="delete-btn" value="Delete checked">
            </form>
        </div>
    </body>
</html>