<?php
// Debugging
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);

session_start();
include('connect.php');
$message = "";

try
{
    if(isset($_POST['button']))
    {
        if(empty($_POST['username']) || empty($_POST['password']))
        {
            $message = "<label>All fields are required</label>";
        }
        else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = [
                'username' => $username,
                'password' => $password
            ];

            $query = "SELECT * FROM user WHERE username = :username AND password = :password";
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            $count = $stmt->rowCount();
            if($count > 0)
            {
                $_SESSION['username'] = $_POST['username'];
                header("Location: check_login.php");
            }
            else
            {
                $message = "Wrong Data";
            }
        }
    }
}
catch(PDOException $e)
{
    $message = "Error: ". $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  </head>
  <body>
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
    <form action="" method="post">
      <div>
        <label for="username">Identity</label>
        <input type="text" name="username">
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password">
      </div>
      <div>
        <button type="submit" name="button" class="btn btn-primary">Log in</button>
      </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>