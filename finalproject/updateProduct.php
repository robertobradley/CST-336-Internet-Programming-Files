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
                    catId = :catId
                WHERE id = :id";
        $np = array();
        $np[":name"] = $_GET['name'];
        $np[":description"] = $_GET['description'];
        $np[":img"] = $_GET['img'];
        $np[":calories"] = $_GET['calories'];
        $np[":catId"] = $_GET['catId'];
        $np[":id"] = $_GET['id'];
                
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
        
    </head>
    <body>
        <h1>Update Product</h1>
        
        <form>
            <input type="hidden" name="id" value= "<?=$product['id']?>"/>
            Name of Vegetable: <input type="text" value = "<?=$product['name']?>" name="name"><br>
            Description: <textarea name="description" cols = 50 rows = 4><?=$product['description']?></textarea><br>
            Calories: <input type="text" name="calories" value = "<?=$product['calories']?>"><br>
    
            Category: <input type ="text" name="catId" value = "<?php getCategories( $product['catId'] ); ?>">
                <br>
            </select> <br />
            Set Image Url: <input type = "text" name = "img" value = "<?=$product['img']?>"><br>
            <input type="submit" name="updateProduct" value="Update Product">
            
        </form>
    </body>
</html>