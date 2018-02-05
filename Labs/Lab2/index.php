<!DOCTYPE html>
<html>
    <head>
        <title> Lab2: 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        function displaySymbol($randomValue)
        {
            switch ($randomValue)
            {
                case 0: 
                    $symbol = "seven";
                    break;
                case 1:
                    $symbol = "orange";
                    break;
                case 2:
                    $symbol = "cherry";
                    break;
            }
            
            
            
            echo "<img src='img/$symbol.png' width = '70' alt = '$symbol' title= '$symbol' />";
        }
        
        $randomValue1 = rand(0,2);
        displaySymbol($randomValue1);
        
        $randomValue2 = rand(0,2);
        displaySymbol($randomValue2);
        
        $randomValue3 = rand(0,2);
        displaySymbol($randomValue3);
        
        // for ($i = 0; $i < 3; $i++)
        // {
        //     displaySymbol();
        // }
        
        
                    
        ?>
<!--
        <img src="img/lemon.png" width = "70" alt = "lemon pic" title= "lemon" />
        <img src="img/cherry.png" width = "70" alt = "cherry pic" title= "cherry" />
        <img src="img/orange.png" width = "70" alt = "orange" title= "orange" />
-->
    </body>
</html>