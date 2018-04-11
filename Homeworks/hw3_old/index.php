<?php


//validation portion and assignment of variables
if(isset($_POST['submit']))
{
    if(empty($_POST['numGames']))
    {
        echo "<h4 class = 'warning'> You did not enter the number of current games played! </h4>";
    }
    else 
    {
     $numGames = $_POST['numGames'];
    }
    
    if(empty($_POST['hoursPlayed']))
    {
        echo "<h4 class = 'warning'> You did not enter the number of hours played per day! </h4>";
    }
    else
    {
    $hoursPlayed = $_POST['hoursPlayed'];
    }
    //radio and check buttons has to be !isset
    if(!isset($_POST['Casual']))
    {
        echo "<h4 class = 'warning'> You did not check an answer for casual player! </h4>";
    }
    else
    {
        $Casual = $_POST['Casual'];
    }
    //same with number forms, add !isset only when 0 is included
    if(!isset($_POST['friends']))
    {
        echo "<h4 class = 'warning'> You did not enter a value for number of friends you play with! </h4>";
    }
    else 
    {
     $friends = $_POST['friends'];   
    }
    //reset button
    //echo "<form method = 'POST' action = '/index.php'><button type='reset' value='Reset'>Reset</button></form>";
}
function resetpage($boolVal)
{
    
    if ($boolVal)
    {
        
     echo "<form method = 'POST' action = 'index.php'><input type='submit' value='Reset' /></form>";   
    }
     
}
//function for displaying
function displayResults()
{
    global $numGames;
    global $hoursPlayed;
    global $Casual;
    global $friends;
    $game_done = false;
    $gamerCount = 0;
    
    //setting parameters for comparing later
    $ultimateGamer = 100;
    $avgGamer = 50;
    $casualGamer = 25;
    $loneWolf = 11;
    
    //counting up the first round of numbers from $numGames
    $gamerCount += $numGames;
    
    
    //counting up the second round of numbers for $hoursPlayed by multiplying
     $gamerCount *= $hoursPlayed;
    
    
    //checking to see if casual was checked and adding up a number for it
    if($Casual == "yes")
    {
        $gamerCount += 10;
    }
    elseif ($Casual == "no") 
    {
        $gamerCount += 14;
    }
    
    //checking friends values and adding acodringly
    switch($friends)
    {
        case 0:
            $gamerCount = $gamerCount;
            break;
        case 1:
            $oldscore = $gamerCount;
            $gamerCount *= 0.5;
            $gamerCount += $oldscore;
            break;
        case 2:
            $oldscore = $gamerCount;
            $gamerCount *= 1; 
            $gamerCount += $oldscore;
            break;
        case 3:
            $gamerCount *= 1.5;
            break;
        case 4:
            $gamerCount *= 2;
            break;
    }
    
    //          finally checking to generate a picture
    //ultimate gamer
    if($gamerCount <= $ultimateGamer && $gamerCount > $avgGamer)
    {
        echo '<img src="img/ultimategamer.jpg" alt="icon" />';
    }
    
    //Average Gamer
    if($gamerCount <= $avgGamer && $gamerCount > $casualGamer)
    {
        echo '<img src="img/avgamer.jpg" alt="icon" />';
    }
    
    //Casual Gamer
    if($gamerCount <= $casualGamer && $gamerCount > $loneWolf)
    {
        echo '<img src="img/casual.jpg" alt="icon" />';
    }
    
    //Lone Wolf gamer
    if($gamerCount <= $loneWolf)
    {
        echo '<img src="img/lonewolf.jpg" alt="icon" />';
    }
    $game_done = true;
    resetpage($game_done);
    
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title> Ultimate Gamer Quiz </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header><h1>Ultimate Gamer Quiz</h1></header>
        <div id = "quizdiv">
            <form method = "POST">
                <h4>How many games do you currently play? </h4>
                <select name = "numGames">
                    <option value ="">Select</option>
                    <option value = "1" <?php if(isset($_POST['numGames'])){if($_POST['numGames']==1){echo "selected";}}?>>1</option>
                    <option value = "2" <?php if(isset($_POST['numGames'])){if($_POST['numGames']==2){echo "selected";}}?>>2</option>
                    <option value = "3"<?php if(isset($_POST['numGames'])){if($_POST['numGames']==3){echo "selected";}}?>>3</option>
                    <option value = "4"<?php if(isset($_POST['numGames'])){if($_POST['numGames']==4){echo "selected";}}?>>4</option>
                </select>
                </br>
                <h4>How many hours in a day do you play?</h4>
                1-9:<input type = "number" min = "1" max = "9" name = "hoursPlayed"  value="<?=$_POST['hoursPlayed']?>" />
                </br>
                <h4>Do you consider yourself a casual player? </h4>
                Yes:<input type = "radio" name = "Casual" value = "yes" <?php if($_POST['Casual'] =='yes'){echo "checked";}?> > 
                No:<input type = "radio" name = "Casual" value = "no" <?php if($_POST['Casual'] =='no'){echo "checked";}?>>
                
                </br>
                <h4>How many friends do you normally play with?</h4>
                0-4:<input type = "number" min = "0" max="4" name = "friends" value="<?=$_POST['friends']?>" />
                <h4>Generate your results:</h4>
                 
                <input type="submit" id= "button" value="Results" name = "submit"/>
            </form>
        </div>
        <?php if(isset($_POST['submit']) && isset($_POST['numGames']) && isset($_POST['hoursPlayed']) && isset($_POST['Casual']) && isset($_POST['friends'])){displayResults();} ?>
    </body>
</html>