<?php session_start();
    include "../dbConnection.php";
                function mainCon()
                {
                  $conn = getDatabaseConnection("finalproject");
                  
                  $sql = "SELECT * FROM produce WHERE 1";
                  
                  
                  $stmt = $conn->prepare($sql);
                  $stmt->execute($np);
                  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  foreach($records as $record)
                  {
                      echo "<h3>". $record["name"] . "</h3><br>";
                      echo "<img src = 'img/". $record["img"] . "' width = '150px' ><br>";
                      echo "<h4>Vegetable Color: <strong class = '".$record['color']."'>".$record["color"]. "</strong></h4>";
                      echo $record["description"] . "<br>";
                      echo "<strong>Vitamins: </strong>" . $record["vitamins"] . "<br>";
                      echo "<strong>Calories: </strong>" . $record["calories"] . "<br>";
                  }
                }
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Home Screen </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>@import url("css/styles.css");</style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    </head>
    <body>
<div class="container">
  <div class="jumbotron">
        <h1> CSUMB Vegetable Facts </h1>
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
                <a class="nav-link" href = <?php 
                if(isset($_SESSION[adminName]))
                {
                  echo '"admin.php"';
                }
                else 
                  {
                    echo '"loginpage.php"';
                  }
                ?>>Admin</a>
              </li>
              
            </ul>
          </div>
        </nav>
        
        <br/>
        <div id = "form">
        <h2>Sort by</h2>
        Color:
          <select id = "color">
              <option value="">Select One</option>
              <option value="red">Red</option>
              <option value="green">Green</option>
              <option value="black">Black</option>
              <option value="white">White</option>
              <option value="orange">Orange</option>
          </select>
          <span>Type: <select id = "type">
              <option value="">Select One</option>
              <option value="1">Roots</option>
              <option value="2">Leaves</option>
          </select>
          
          </span>
        </div>
        
        
  <script>
        
        $(document).ready(function(){
          
          
          $("#type").change(function(){
                $.ajax({url: "typesApi.php", 
                  dataType: "json",
                  type: "GET",
                  data: {"type": $(this).val()}, 
                  success: function(data,status)
                  {
                    $("#connection").empty();
                    for(i = 0; i < data.length;i++)
                    {
                      $("#connection").append(data[i].name);
                      $("#connection").append("<img src = 'img/" + data[i].img + "'width = '150px'>");
                      
                    }
            
                  },
                  
                });
          });
          
          
              $("#color").change(function(){
                $.ajax({url: "colorApi.php", 
                  dataType: "json",
                  type: "GET",
                  data: {"color": $(this).val()}, 
                  success: function(data,status)
                  {
                    $("#connection").empty();
                    for(i = 0; i < data.length;i++)
                    {
                      $("#connection").append(data[i].name);
                      $("#connection").append("<img src = 'img/" + data[i].img + "'width = '150px'>");
                      
                    }
            
                  },
                  
                });
          });
      });
  </script>
        
        <div id = "connection">
                <?php
                mainCon();
                ?>
        </div>
</div>
<?php
        if(isset($_SESSION['wrongPass']))
        {
            echo $_SESSION['wrongPass'];
        }
        
        

?>
        </form>
    </body>
</html>