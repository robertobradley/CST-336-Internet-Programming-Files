<?php
function displayCart()
{
    if(isset($_SESSION['cart']))
    {
        echo "<table class = 'table'>";
        foreach ($_SESSION['cart'] as $item)
        {
            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            echo '<tr>';
            
            //display data for item
            echo "<td><img src='" .$item['img'] . "'></td>";
            echo "<td><h4>". $item['name'] . "</h4></td>";
            echo "<td><h4>$" .$item['price'] . "</h4></td>";
            
            //update form for this item
            echo '<form method = "post">';
            echo "<input type ='hidden' name = 'itemId' value = '$itemId'>";
            echo "<td><input type='text' name = 'update' class = 'form-control'placeHolder = '$itemQuant'></td>";
            echo '<td><button class ="btn btn-danger">Update</button></td>';
            echo '</form>';
            
            //create separate form for delete
            echo "";
            echo "";
            echo "";
            echo "";
            
            echo '</tr>';
        }
        echo "</table>";
    }
}

function displayResults()
{
    global $items; //getting global items array
    
    if(isset($items))
    {
        echo "<table class = 'table'>";
        foreach ($items as $item)
        {
            $itemName = $item['name'];
            $itemPrice = $item['salePrice'];
            $itemImage = $item['thumbnailImage'];
            $itemId = $item['itemId'];
        }
        // Display item for table rows
        echo '<tr>';
        echo "<td><img src = '$itemImage'></td>";
        echo "<td><h4>$itemName</h4></td>";
        echo "<td><h4>$$itemPrice</h4></td>";
        
        
        //hidden input element containing the item name
        echo "<form method='post'";
        echo "<input type='hidden' name='itemName' value = '$itemName'>";
        echo "<td><button class = 'btn btn-warning'>Add</button></td>";
        echo "</form>";
        
        echo "</tr>";
    }
    echo "</table>";
}
?>