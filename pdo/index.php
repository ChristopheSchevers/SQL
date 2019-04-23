<?php
include('connect.php');

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

// Get data
$sql = "SELECT * FROM Weather";
$q = $pdo->query($sql);

$q->setFetchMode(PDO::FETCH_ASSOC);

$pdo = null;
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
                            <td><input type="checkbox" name="selector[]" value=""></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <form method="post" action="">
                <input type="text" name="city">
                <input type="number" name="high">
                <input type="number" name="low">
                <input type="submit" name="insert" value="Submit">
                <a href="delete.php">Delete selected</a>
            </form>
        </div>
    </body>
</html>