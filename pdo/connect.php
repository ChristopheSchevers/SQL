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
?>