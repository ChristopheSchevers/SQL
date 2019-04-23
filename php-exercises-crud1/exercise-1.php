<?php
include('connect.php');

try{
    $sql = "SELECT * FROM clients";
    $q = $pdo->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
    echo 'Error: '. $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Colyseum</title>
</head>
    <body>
        <div class="container">
            <a href="index.php" class="btn btn-success">Go back</a>
            <h1>All customers</h1>
            <table class="table">
                <thead>
                    <th scope="col">First name</th>
                    <th scope="col">Surname</th>
                </thead>
                <tbody>
                    <?php while($row = $q->fetch()): ?>
                    <tr>
                        <td scope="row"><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>