<!DOCTYPE html>
<?php
    function getRandomColor()
    {
        echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100).");";
    }
?>
<html>
    <head>
        <title> Random Color </title>
    </head>
    <body>
    <style>
    
        body 
        {
            <?php
            
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100).");";
            ?>
            
        }
        h2
        {
            color: <?php getRandomColor() ?>;
        }
        h3 
        {
         color: <?= getRandomColor() ?>;
         background-color: ;
        }
    </style>
    <h1> Welcome! </h1>
    <h2> Random Colors!</h2>
    
    </body>
</html>