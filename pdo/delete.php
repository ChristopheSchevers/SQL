<?php
include('connect.php');

// Delete checked
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqlDel = "DELETE FROM Weather WHERE id = :id";

    $stmtDel = $pdo->prepare($sqlDel);
    $stmtDel->bindParam(':id', $id);
    $stmtDel->execute();

    header('location: index.php');


    /*$todelete = $_POST['selector'];
    $N = count($todelete);
    var_dump($N);
    for($i=0; $i < $N; $i++) {
        $sqlDel = $pdo->prepare("DELETE FROM Weather WHERE id = :memid");
        $sqlDel->bindParam(':memid', $sqlDel[$i]);
        $sqlDel->execute();
    }
    header("Location: index.php");
    $pdo = null;*/
}
?>