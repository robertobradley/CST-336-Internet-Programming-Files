<?php

    include "../dbConnection.php";
    $conn = getDatabaseConnection("finalproject");
    
    if($_GET['id'] == "avg"){
     $sql = "SELECT AVG(calories) as average FROM produce";
    }
    else if($_GET['id'] == "veg"){
     $sql = "SELECT COUNT(catId) as count FROM produce GROUP BY catId";
    }
    else if($_GET['id'] == "catAv"){
     $sql = "SELECT AVG(calories) as average FROM produce GROUP BY catId";
    }
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>

