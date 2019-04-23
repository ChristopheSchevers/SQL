<?php
include('connect.php');

// Delete checked
if(isset($_POST['delete'])){
    $todelete = $_POST['selector'];
    $N = count($todelete);
    var_dump($N);
    for($i=0; $i < $N; $i++) {
        $sqlDel = $pdo->prepare("DELETE FROM Weather WHERE id = :memid");
        $sqlDel->bindParam(':memid', $sqlDel[$i]);
        $sqlDel->execute();
    }
    header("Location: index.php");
    $pdo = null;
}
?>