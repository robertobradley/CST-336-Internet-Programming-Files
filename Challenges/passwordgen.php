<?php

    $numbers = [0,1,2,3,4,5,6,7,8,9];
    
    $letters = ['A', 'B','C','D','E','F','G', 'H','I', 'J','K', 'L','M', 'N','O', 'P','Q', 'R','S', 'T','U', 'V','W', 'X','Y', 'Z'];

    $result = [];
    
    $length = rand(5,10);
    
    
    function randomStuff(){
        
        global $result;
        global $numbers;
        global $letters;
        
     
        
        // for($i = 0; $i < $length; $i++){
        //     $result .= array_push($result, $numbers[$i]);
        // }
        
    }

    array_push($result, $letters[6],  $letters[7] );
    
    
        for($i = 0; $i < $length; $i++){
            echo "$result[$i]";
            // $result .= array_push($result, $numbers[$i]);
        }
   


    
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Password Generator</title>
    </head>
    <body>

    </body>
</html>