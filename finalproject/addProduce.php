<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:home.php");
}
include "../dbConnection.php";
$conn = getDatabaseConnection("finalproject");


if (isset($_GET['submitProduce'])) {
    $name = $_GET['name'];
    $description = $_GET['description'];
    $image = $_GET['image'];
    $vitamins = $_GET['vitamins'];
    $catId = $_GET['catId'];
    $calories = $_GET['calories'];
    $color = $_GET['color'];
    
    $sql = "INSERT INTO produce
            ( `name`, `description`, `img`, `vitamins`, `calories`,  `catId`, `color`) 
             VALUES ( :name, :description, :image, :vitamins, :calories, :catId, :color)";
    
    $namedParameters = array();
    $namedParameters[':name'] = $name;
    $namedParameters[':description'] = $description;
    $namedParameters[':image'] = $image;
    $namedParameters[':vitamins'] = $vitamins;
    $namedParameters[':catId'] = $catId;
    $namedParameters[':calories'] = $calories;
    $namedParameters[':color'] = $color;
    
     $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add a vegetable </title>
        <style>body {
            text-align: center !important;
        }</style>
    </head>
    <body>
        <h1> Add a vegetable</h1>
        <form>
            Vegetable Name: <input type="text" name="name"><br>
            Description: <textarea name="description" cols = 50 rows = 4></textarea><br>
            Vitamins: <input type="text" name="vitamins"><br>
            Calories: <input type = "text" name="calories">
             <br />
            Set Image Url: <input type = "text" name = "image"><br>
            Set Category: 
        <select name = "catId">
              <option value="1">Roots</option>
              <option value="2">Leaves</option>
        </select><br>
            Set Color:
            <select name = "color">
              <option value="red">Red</option>
              <option value="green">Green</option>
              <option value="black">Black</option>
              <option value="white">White</option>
              <option value="orange">Orange</option>
        </select><br>
             <span><button type = "button"><a  href = "admin.php">Back</a>  </button> </span>
            <input type="submit" name="submitProduce" value="Add Product" action = "admin.php">
        </form>
    </body>
</html>