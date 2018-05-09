<?php
 include "../dbConnection.php";
    $conn = getDatabaseConnection("finalproject");
    
   $sql = "SELECT catDesc FROM f_category WHERE catId ='". $_GET['catId'] . "'";
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>