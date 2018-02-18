<?php
 function displaySymbol($randomValue,$pos)
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
                case 3:
                    $symbol ="bar";
                    break;
            }
            
            
            
            echo "<img id ='reel$pos' src='img/$symbol.png' width = '70' alt = '$symbol' title= '$symbol' />";
        }
    
  $audio = "<audio src = 'jackpot.wav' type = 'audio/wav'>";
    
    function points($randval1,$randval2,$randval3)
        {
            echo "<div id = 'output'>";
            if($randval1 == $randval2 && $randval2 == $randval3)
            {
                switch($randval1)
                {
                    case 0: $totalPoints = 1000;
                    echo "<h1> Jackpot! </h1>";
                    echo $audio;
                    break;
                    case 1: $totalPoints = 750;
                    echo $audio;
                    break;
                    case 2: $totalPoints = 250;
                    echo $audio;
                    break;
                    case 3: $totalPoints = 900;
                    echo $audio;
                    break;
                }
                echo "<h2> You won $totalPoints points!</h2>"; 
            }
            
           else 
           {
            echo "<h3> Try again! </h3>";   
           } 
          echo "</div>";
        }
    
    function play()
        {
            for($i = 1; $i < 4; $i++)
            {
                ${"randomValue" . $i} = rand(0,3);
                displaySymbol(${randomValue . $i},$i);
            }
            points($randomValue1,$randomValue2,$randomValue3);
        }
?>