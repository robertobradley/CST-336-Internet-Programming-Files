<?php
    include '../dbConnection.php';
    
    $connection = getDatabaseConnection("finalproject");
    
    function getCategories($catId) {
    global $connection;
    
    $sql = "SELECT catId FROM produce WHERE id =" . $_GET['id'];
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        
        echo $record["catId"];
    }
}
    
    function getInfo()
    {
        global $connection;
        $sql = "SELECT * FROM produce WHERE id = " . $_GET['id'];
    
        //echo $_GET["productId"];
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    
    if (isset($_GET['updateProduct'])) {
        
        //echo "Trying to update the product!";
        
        $sql = "UPDATE produce
                SET name = :name,
                    description = :description,
                    img = :img,
                    calories = :calories,
                    catId = :catId,
                    color = :color
                WHERE id = :id";
        $np = array();
        $np[":name"] = $_GET['name'];
        $np[":description"] = $_GET['description'];
        $np[":img"] = $_GET['img'];
        $np[":calories"] = $_GET['calories'];
        $np[":catId"] = $_GET['catId'];
        $np[":id"] = $_GET['id'];
        $np[":color"] = $_GET['color'];
                
        $statement = $connection->prepare($sql);
        $statement->execute($np);        

        
    }
    
    
    if(isset ($_GET['id']))
    {
        $product = getInfo();
    }
    
    //print_r($product);
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Product </title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
         <style>body {
            text-align: center !important;
        }</style>
    </head>
    <body>
        <h1>Update Vegtable Info</h1>
        
        <form>
            <input type="hidden" name="id" value= "<?=$product['id']?>"/>
            Name of Vegetable: <input type="text" value = "<?=$product['name']?>" name="name"><br>
            Description: <textarea name="description" cols = 50 rows = 4><?=$product['description']?></textarea><br>
            Calories: <input type="text" name="calories" value = "<?=$product['calories']?>"><br>
    
            Category: <select name = "catId">
              <option value="1" <?php if($product['catId'] == '1'){echo ' selected="selected"';}?>>Roots</option>
              <option value="2" <?php if($product['catId'] == '2'){echo ' selected="selected"';}?>>Leaves</option>
        </select><br>
            Set Image Url: <input type = "text" name = "img" value = "<?=$product['img']?>"><br>
            Color: 
            <select name = "color">
              <option value="red" <?php if($product['color'] == 'red'){echo ' selected="selected"';}?>>Red</option>
              <option value="green" <?php if($product['color'] == 'green'){echo ' selected="selected"';}?>>Green</option>
              <option value="black" <?php if($product['color'] == 'black'){echo ' selected="selected"';}?>>Black</option>
              <option value="white" <?php if($product['color'] == 'white'){echo ' selected="selected"';}?>>White</option>
              <option value="orange" <?php if($product['color'] == 'orange'){echo ' selected="selected"';}?>>Orange</option>
        </select><br><br>
        <span><button type = "button"><a  href = "admin.php">Back</a>  </button> </span>
        
            <input type="submit" name="updateProduct" value="Update Product">
            
        </form>
    </body>
</html>