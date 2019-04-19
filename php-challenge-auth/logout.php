<?php
// Debugging
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);


//Logout 
session_start();
session_destroy();
header("Location: login.php");
?>