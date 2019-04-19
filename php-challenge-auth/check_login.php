<?php
// Debugging
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);

session_start();

if(isset($_SESSION['username']))
{
    echo '<h3>Login Success, Welcome -'.$_SESSION['username'].'</h3>';
    echo '<br><br><a href="logout.php">Logout</a>';
}
else
{
    header("Location: login.php");
}
?>