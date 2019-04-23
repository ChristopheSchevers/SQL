<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    
    // User data variables
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $db = 'reunion_island';

    // Connect
    try{
        $pdo = new PDO("mysql:host=$servername; dbname=$db; charset=utf8mb4",$username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die ("Connection failed: ". $e->getMessage());
    }
?>