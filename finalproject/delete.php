<?php

 include '../dbConnection.php';
    
 $connection = getDatabaseConnection("finalproject");
    
 $sql = "DELETE FROM produce WHERE id =  " . $_GET['id'];
 $statement = $connection->prepare($sql);
 $statement->execute();
 
 header("Location: admin.php");
?>
?>