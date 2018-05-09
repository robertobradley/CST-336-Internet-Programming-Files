<?php
    include "../dbConnection.php";
    $conn = getDatabaseConnection("finalproject");
    $sql;
    
  
    
    // Both color and type
    if($_GET['color'] != "0" && $_GET['type'] != "0"){
        $sql = "SELECT * FROM produce WHERE color = '" . $_GET['color'] . "' AND catId = '" . $_GET['type'] . "'";
    }
    
    //Only color given
    else if($_GET['color'] != "0" && $_GET['type'] == "0") {
        $sql = "SELECT * FROM produce WHERE color = '" . $_GET['color'] . "'";
    }
    //Only type given
    else if($_GET['color'] == "0" && $_GET['type'] != "0") {
       $sql = "SELECT * FROM produce WHERE catId = '" . $_GET['type'] . "'";
        
    }
    //color and type not given
    else{
        $sql = "SELECT * FROM produce";
         
    }
    
    //Checking if other filter is given
    if($_GET['color'] != "0" || $_GET['type'] != "0") {
            $sql .= " AND name like '%" . $_GET['keyword'] . "%'";
           // $sql .= " AND name like '% broc %'";
    }
    
    //None other filters was given
    else {
        $sql .= " WHERE name like '%" . $_GET['keyword'] . "%'";
    }

    if($_GET['orderby'] == "calories"){
        $sql .= " ORDER BY calories";
    }
    else if($_GET['orderby'] == "name"){
        $sql .= " ORDER BY name";
    }
    
    $stmt = $conn->prepare($sql);  
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);
    //echo $sql;
    echo json_encode($record);
?>