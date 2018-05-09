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
        <style>@import url("css/styles.css");</style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>body {
            text-align: center !important;
        }</style>
        
    </head>
    <body>
        <div class = "container">
        <div class="well well-lg">
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
        </div>
        </div>
    </body>
</html>