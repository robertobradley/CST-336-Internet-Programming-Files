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
            echo '<form method = "POST">';
            echo "<input type ='hidden' name = 'itemId' value = '$itemId'>";
            echo "<td><input type='text' name = 'update' class = 'form-control'placeHolder = '$itemQuant'></td>";
            echo '<td><button class ="btn btn-danger">Update</button></td>';
            echo '</form>';
            
            //create separate form for delete
            echo "<form method='POST>";
            echo "<input type='hidden' name='removeId' value=$itemId'>";
            echo '<td><button class ="btn btn-danger">Remove</button></td>';
            echo '</form>';
            
            echo '</tr>';
        }
        echo "</table>";
    }
}//end of function

function displayCartCount()
{
    echo count($_SESSION['cart']);
}//end of function

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
        
        // Display item for table rows
        echo '<tr>';
        echo "<td><img src = '$itemImage'></td>";
        echo "<td><h4>$itemName</h4></td>";
        echo "<td><h4>$$itemPrice</h4></td>";
        
        //hidden input element containing the item name
        echo "<form method='POST'";
        echo "<input type='hidden' name='itemName' value = '$itemName'>";
        echo "<input type='hidden' name='itemPrice' value = '$itemPrice'>";
        echo "<input type='hidden' name='itemImg' value = '$itemImg'>";
        echo "<input type='hidden' name='itemId' value = '$itemId'>";
        //checks to see if the most recent POST request has the same itemId.
        // If so, this item was just added to the card. Display different button.
        if($_POST['itemId'] == $itemId)
        {
            echo '<td><button class = "btn btn-success">Added</button></td>';
        }
        else 
        {
            echo '<td><button class = "btn btn-warning">Add</button></td>';
        }
        echo '</tr';
        echo "</form>";
        }
        echo "</table>";
    }
}//end of function
?>