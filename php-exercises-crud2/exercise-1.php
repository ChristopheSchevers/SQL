<?php
 
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
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">
            </div>
            <div class="form-group">
                <label for="birthDate">Date of Birth</label>
                <input type="date" name="birthDate">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkBox">
                <label class="form-check-label" for="checkBox">Loyalty Card</label>
            </div>
            <div class="form-group">
                <label for="cardNumber">Loyalty Card Number</label>
                <input type="number" name="cardNumber" disabled>
            </div>
        </form>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>