<?php
    // Connect from connect.php file
    require_once('connect.php');

    // Insert data
    if(isset($_POST['create-btn'])){
        try{
            $sTitle = $_POST['showTitle'];
            $performer = $_POST['performer'];
            $sDate = $_POST['showDate'];
            $typeSelect = $_POST['typeSelect'];
            $firstGenre = $_POST['firstGenre'];
            $secondGenre = $_POST['secondGenre'];
            $duration = $_POST['duration'];
            $startTime = $_POST['startTime'];

            $data = [
                'title'       => $sTitle,
                'performer'   => $performer,
                'date'        => $sDate,
                'showTypesId' => $typeSelect,
                'firstGenresId'  => $firstGenre,
                'secondGenreId' => $secondGenre,
                'duration'  => $duration,
                'startTime' => $startTime
            ];

            $sql = "INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (:title, :performer, :date, :showTypesId, :firstGenresId, :secondGenreId, :duration, :startTime)";

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
            <h2 class="card-title">Add a show</h2>
            <div class="card-body d-flex align-items-center justify-content-center">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="showTitle">Title</label>
                        <input type="text" name="showTitle">
                    </div>
                    <div class="form-group">
                        <label for="performer">Performer</label>
                        <input type="text" name="performer">
                    </div>
                    <div class="form-group">
                        <label for="showDate">Date</label>
                        <input type="date" name="showDate">
                    </div>
                    <div class="form-group">
                        <label for="typeSelect">Show type</label>
                        <select name="typeSelect" id="typeSelect" class="form-control">
                            <option value="1">Concert</option>
                            <option value="2">Theatre</option>
                            <option value="3">Comedy</option>
                            <option value="4">Dance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="firstGenre">First genre</label>
                        <select name="firstGenre" id="firstGenre" class="form-control">
                            <option value="1">All kinds of French songs</option>
                            <option value="2">All kinds international</option>
                            <option value="3">Pop/Rock</option>
                            <option value="4">Electronic</option>
                            <option value="5">Folk</option>
                            <option value="6">Rap</option>
                            <option value="7">Hip Hop</option>
                            <option value="8">Slam</option>
                            <option value="9">Reggae</option>
                            <option value="10">Clubbing</option>
                            <option value="11">RnB</option>
                            <option value="12">Soul</option>
                            <option value="13">Funk</option>
                            <option value="14">Jazz</option>
                            <option value="15">Blues</option>
                            <option value="16">Country</option>
                            <option value="17">Gospel</option>
                            <option value="18">World music</option>
                            <option value="19">Classic</option>
                            <option value="20">Opera</option>
                            <option value="21">Others</option>
                            <option value="22">Drama</option>
                            <option value="23">Comedy</option>
                            <option value="24">Contemporary</option>
                            <option value="25">Monologue</option>
                            <option value="26">One Man/Woman Show</option>
                            <option value="27">Theatre club</option>
                            <option value="28">Stand Up</option>
                            <option value="29">Others</option>
                            <option value="30">Contemporary</option>
                            <option value="31">Classic</option>
                            <option value="32">Urban</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="secondGenre">Second Genre</label>
                        <select name="secondGenre" id="secondGenre" class="form-control">
                            <option value="1">All kinds of French songs</option>
                            <option value="2">All kinds international</option>
                            <option value="3">Pop/Rock</option>
                            <option value="4">Electronic</option>
                            <option value="5">Folk</option>
                            <option value="6">Rap</option>
                            <option value="7">Hip Hop</option>
                            <option value="8">Slam</option>
                            <option value="9">Reggae</option>
                            <option value="10">Clubbing</option>
                            <option value="11">RnB</option>
                            <option value="12">Soul</option>
                            <option value="13">Funk</option>
                            <option value="14">Jazz</option>
                            <option value="15">Blues</option>
                            <option value="16">Country</option>
                            <option value="17">Gospel</option>
                            <option value="18">World music</option>
                            <option value="19">Classic</option>
                            <option value="20">Opera</option>
                            <option value="21">Others</option>
                            <option value="22">Drama</option>
                            <option value="23">Comedy</option>
                            <option value="24">Contemporary</option>
                            <option value="25">Monologue</option>
                            <option value="26">One Man/Woman Show</option>
                            <option value="27">Theatre club</option>
                            <option value="28">Stand Up</option>
                            <option value="29">Others</option>
                            <option value="30">Contemporary</option>
                            <option value="31">Classic</option>
                            <option value="32">Urban</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="time" name="duration">
                    </div>
                    <div class="form-group">
                        <label for="startTime">Start time</label>
                        <input type="time" name="startTime">
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
</body>
</html>