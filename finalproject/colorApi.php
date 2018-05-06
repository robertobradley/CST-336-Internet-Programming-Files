<?php
    include "../dbConnection.php";
    $conn = getDatabaseConnection("finalproject");
    
     $sql = "SELECT * FROM produce WHERE color = :color";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":color"=>$_GET['color']));
      $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>