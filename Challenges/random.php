<!DOCTYPE html>
<html>
    <head>
        <title> Random Card </title>
        
    </head>
    <body>
    <?php
    function displaycard($randomsuit, $randomrank)
    {
        echo $randomsuit;
        echo $randomrank;
        
        switch($randomsuit){
            case 0: $suit = "clubs";
            break;
            case 1: $suit ="diamonds";
            break;
            case 2: $suit ="spades";
            break;
            case 3: $suit ="hearts";
            break;
        }
        
        switch($randomrank)
        {
            case 0: $rank = "ten";
            break;
            case 1: $rank = "jack";
            break;
            case 2: $rank = "queen";
            break;
            case 3: $rank = "king";
            break;
            case 4: $rank = "ace";
            break;
        }
        echo "<img src = 'cards/$suit/$rank.png' width ='70' alt = '$suit,$rank'>";
    }
    
    $randval1 = rand(0,3);
    $randval2 = rand(0,4);
    displaycard($randval1, $randval2);
    
    $randval3 = rand(0,3);
    $randval4 = rand(0,4);
    displaycard($randval3, $randval4);
    
    if($randval1 > $randval3){
        echo"<h1>HUMAN WINS!</h1>";
    }
    
    ?>

    </body>
</html>