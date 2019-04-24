<?php
    // Connect from connect.php file
    require_once('connect.php');

    // Insert data
    if(isset($_POST['create-btn'])){
        try{
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $bDate = $_POST['birthDate'];
            $card = $_POST['card'];
            $cNumber = $_POST['cardNumber'];

            if($card == 'on'){
                $card = 1;
            } else {
                $card = 0;
                $cNumber = NULL;
            }

            $data = [
                'firstName' => $fName,
                'lastName'  => $lName,
                'birthDate' => $bDate,
                'card'      => $card,
                'cardNumber' => $cNumber
            ];

            $sql = "INSERT INTO clients (firstName, lastName, birthDate, card, cardNumber) VALUES (:firstName, :lastName, :birthDate, :card, :cardNumber)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
        }
        catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
            die();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Colyseum Forms</title>
</head>
<body>
    <div class="container text-center">
        <div class="card col-8 offset-2 mt-5">
            <h2 class="card-title">Add a customer</h2>
            <div class="card-body d-flex align-items-center justify-content-center">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName">                        
                    </div>
                    <div class="form-group">
                        <label for="birthDate">Date of Birth</label>
                        <input type="date" name="birthDate">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkBox" name="card">
                        <label class="form-check-label" for="checkBox">Loyalty Card</label>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Loyalty Card Number</label>
                        <input type="number" id="checkTxt" name="cardNumber" disabled>
                    </div>
                    <input type="submit" name="create-btn" value="Add">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Code to enable card number input when checked -->
    <script type="text/javascript">
        $("#checkBox").change(function(){
            var state = this.checked;
            if(state){
                $("#checkTxt").prop("disabled", false);
            } else {
                $("#checkTxt").prop("disabled", true);
            }
        });        
    </script>
</body>
</html>