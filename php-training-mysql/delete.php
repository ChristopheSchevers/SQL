<?php
    // Make connection with DB
    require_once('connect.php');

    try{
        // Get id from URL
        $id = $_GET['id'];    

        $sqlDel = "DELETE FROM hiking WHERE ID=:ID";
        $delstmt = $pdo->prepare($sqlDel);
        $delstmt->bindValue('ID',$id);
        $delstmt->execute($q);

        header('Location: read.php?delete');
    } 
    catch(PDOExpection $e){
        echo "Error: ". $e->getMessage();
    }
?>