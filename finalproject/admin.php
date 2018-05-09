<?php

session_start();

//Making it to where people cannot direct connect to admin.php without loging in.
if(!isset( $_SESSION['adminName']))
{
  header("Location:loginpage.php");
}
include '../dbConnection.php';
$conn = getDatabaseConnection("finalproject");

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM produce";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);

    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
           
            form {
                display: inline;
            }
            
        </style>
  
        <?php //boot strap code?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
       
        
    </head>
    <body>


<div class="container">
  <div class="jumbotron">
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
    </div>
</div>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="http://csumb.edu">CSUMB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              
            </ul>
          </div>
        </nav>
        

        <br />
        
        </div>
        </div>
        <strong>Admin Logout: </strong> 
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        <h2>Generate reports</h2>
        <div id = "reports">
            <input type = "button" id = "avg" value = "Average Calories">
            <input type = "button" id = "veg" value = "Total Number of Vegetables">
            <input type = "button" id = "catAv" value = "Calories per vegetable type
            ">
            <div id = "result"></div>
            
        </div>
        <br />
        <div id = "produce">
        <h2> <strong>Produce Table: </strong></h2>
        
        <div class="form-group">
        <form action="addProduce.php">
            <input type="submit" name="addproduce" value="Add Produce"/>
        </form>
        
        
        <br><br>
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                echo "[<a href='updateProduct.php?id=".$record['id']."'>Update</a>]";
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
                
                echo "<form action='delete.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='id' value= " . $record['id'] . " />";
                echo "<input type='submit' value='Remove' class = 'delete'>";
                echo "</form>";
                
                echo $record['name'];
                echo '<br>';
            }
        ?>
        </div>
    </div>    
         <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete it?");
                
            }
            
            $("#avg").click(function(){
               reportclick("avg"); 
            });
            
            $("#veg").click(function(){
               reportclick("veg"); 
            });
            
            $("#catAv").click(function(){
               reportclick("catAv"); 
            });
            
            function reportclick(token)
            {
                 $.ajax({url: "reportsApi.php", 
                  dataType: "json",
                  type: "GET",
                  data: {
                   id: token
                  }, 
                  success: function(data,status)
                  {
                    $("#result").empty();
                    if(token == "avg"){
                   $("#result").append("<h4><strong>Average Calories within table: </strong></h4><h5>" + data[0].average + "</h5>");
                    }
                    else if(token == "veg")
                    {
                        $("#result").append("<h4><strong>Number of Root vegetables in database: </strong></h4><h5>" + data[0].count + "</h5>");
                        $("#result").append("<h4><strong>Number of Leaf vegetables in database: </strong></h4><h5>" + data[1].count + "</h5>");
                    }
                    else if(token == "catAv")
                    {
                         $("#result").append("<h4><strong>The Average calories for Root vegetables: </strong></h4><h5>" + data[0].average + "</h5>");
                         $("#result").append("<h4><strong>The Average calories for Leaf vegetables: </strong></h4><h5>" + data[1].average + "</h5>");
                    }
                  },
                  error: function(data,status) {
                    //Printing error response
                    console.log(data.responseText)
                  }
                  
                });
            }
        </script>

    </body>
</html>