<?php

 //print_r($_POST); //displays the values
 include '../../dbConnection.php';
 $conn = getDatabaseConnection("ottermart");
 
 $username = $_POST['username'];
 $password = sha1($_POST['password']);
 
//echo $password;
$sql = "SELECT *
        FROM om_admin
        WHERE username = '$username'
        AND password = '$password'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //expecting one single record

//print_r($record);

if(empty($record))
{
    echo "wrong username or password";
}
else 
{
 echo $record['firstName']. " ".$record['lastName'];   
}

?>