<?php
include('connect.php');

try{
    $sql = "SELECT * FROM clients";
    $q = $pdo->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);

    // Function to convert numeric booleans to yes and no
    function yesNo(&$value){
        $value = $value == true ? 'Yes' : 'No';
        return $value;
    }

    // Function to check if value is not empty, then it will add Card Number to the code
    function showNumber($value){
        if(!empty($value)){
            return '&emsp; Card Number: '.$value;
        }
    }
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
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Shows</h1>
                    <ul class="list-group list-group-flush">
                        <?php while($row = $q->fetch()): ?>
                        <li class="list-group-item">
                            <?php 
                            echo 'Name: '.$row['lastName'].'&emsp; First Name: '.$row['firstName'].'&emsp; Date of Birth: '.$row['birthDate'].'&emsp; Loyalty Card: '.yesNo($row['card']).showNumber($row['cardNumber']); 
                            ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bootstrap scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>