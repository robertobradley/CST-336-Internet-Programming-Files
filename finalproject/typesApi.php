<?php

    include "../dbConnection.php";
    $conn = getDatabaseConnection("finalproject");
    
     $sql = "SELECT * FROM produce WHERE catId = :type";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":type"=>$_GET['type']));
      $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>