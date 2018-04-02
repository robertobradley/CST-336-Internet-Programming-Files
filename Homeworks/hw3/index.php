<!DOCTYPE html>
<html>
    <head>
        <title> Game Card Generator </title>
         <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header><h1>Game Card Generator</h1></header>
        <div id = "game_options">
            <form method = "POST">
                <h4>Number of Players:</h4>
                <select name = "player">
                    <option value = "1" <?php if(isset($_POST["player"])){if ($_POST["player"] == 1){echo "selected";}} ?> >1 Player</option>
                    <option value = "2" <?php if(isset($_POST["player"])){if ($_POST["player"] == 2){echo "selected";}} ?> >2 Player</option>
                    <option value = "3" <?php if(isset($_POST["player"])){if ($_POST["player"] == 3){echo "selected";}} ?> >3 Player</option>
                    <option value = "4" <?php if(isset($_POST["player"])){if ($_POST["player"] == 4){echo "selected";}} ?> >4 Player</option>
                    
                </select>
                </br>
                <h4>Number of cards:</h4>
                1-7:<input type = "number" min = "1" max = "7" name = "cardNumber"/>
                </br>
                <h4>Duplicate cards:</h4>
                Yes:<input type = "radio" name = "Duplicates" value = "yes"> 
                No:<input type = "radio" name = "Duplicates" value = "no">
                
                </br>
                <h4>Random Player Names</h4>
                1-4:<input type = "number" min = "1" max="4" name = "Names" />
                <h4>Generate Cards:</h4>
                 
                
                <input type="submit" id= "button" value="Generate"/>
            </form>
          
        </div>
        
<?php


//Validation portion
$player = $_POST["player"];

if(isset($_POST["cardNumber"]))
{
 $cardNumber = $_POST["cardNumber"];
}
else
{
    echo "You did not set a correct card number";
}

if(isset($_POST["Duplicates"]))
{
    $Duplicates = $_POST["Duplicates"];
}
else
{
    echo "You did not set a correct card number";
}

if(isset($_POST["Names"]))
{
    $Names = $_POST["Names"];
}
else
{
    echo "You did not set the Player Names";
}

//creating array of numbers to choose cards
$myDeck = array();
for ($i = 1; $i < 53; $i++) {
	array_push($myDeck, $i);
}

//generating random names to be displayed at end.
$randomnames = array("Queen Bee","Stupor Panupor","Lame Sauce","George Highlander","Mark the Shark","Sheila Killya","Holy Hurley","Steve Weevie");
shuffle($randomnames);

//arrays for putting everything together
$player1 = array();
$player2 = array();
$player3 = array();
$player4 = array();
$allHands = array();

//generates random names to be displayed
function randnames($Names,$randomnames)
{
	for($i = 0;$i < $Names; $i++)
	{
		${"name" . $i} = file($randomnames[$i]);
		echo $name[$i];
	}
	
}

function echocards($allHands)
{
	foreach($allHands as $element => $inner_array)
	{
		foreach($inner_array as $card)
		{
			echo $card;
		}
	}
}


//making bool for duplicates
if($duplicates == "yes")
{
$dupe = true;
}
else 
{
    $dupe = false;
}

function start()
{
	global $player;
	global $Names;
	global $randomnames;
 
	 for($i = 0; $i < $player;$i++)
	    {
	     
	        getHand($i);
	     
	    }
	    randnames($Names,$randomnames);
}


function getHand($playerNumber) 
{
	
	#Creating global variables, so they can be used in this function.
	global $myDeck;
	
	#allowing the arrays for players to be used
	global $allHands;
	global $player;
	global $player1;
	global $player2;
	global $player3;
	global $player4;
	global $cardNumber;
	global $dupe;
	
	$isLast_num = $player;
	#Creating an array to store the 4 suits of the deck for the PATHWAY.
	$mySuits = array("clubs", "diamonds", "hearts", "spades");
	
	#Creating a flag to control the while loop.
	$flag = true;
	
	#Shuffling all my cards before entering the while loop, so it is random.
	shuffle($myDeck);

	if($dupe == true)
	{
	    while($flag) 
	    {
	    	$counter_forif = 1;
		    $randomCard = rand(1,52);
		    
		    $tempHand = "<img class='cards' src='img/". $mySuits[ceil($randomCard / 13) - 1]."/" . $card . ".png'/>";
		    if($playerNumber == 0)
			{
				array_push($player1,$tempHand);
			}
			if($playerNumber == 1)
			{
				array_push($player2, $tempHand);
			}
			if($playerNumber == 2)
			{
				array_push($player3, $tempHand);
			}
			if($playerNumber == 3)
			{
				array_push($player4, $tempHand);
			}
			
			$counter_forif +=1;
			#Displaying the cards.
			
			//echo $tempHand;
			
			#If it has reached the amount of cards needed, add to allhands, print and jump out of while loop
			if($counter_forif == $cardNumber)
			{
				if($playerNumber == 0)
				{
					array_push($allHands,$player1);
					if(($playerNumber+1) == $isLast_num)
					{
					    echocards($allHands);
					    $flag = false;
					}
				}
				
				if($playerNumber == 1)
				{
					array_push($allHands,$player2);
					if(($playerNumber+1) == $isLast_num)
					{
					    echocards($allHands);
						$flag = false;
					}
				}
				
				if($playerNumber == 2)
				{
					array_push($allHands,$player3);
					if(($playerNumber+1) == $isLast_num)
					{
					    echocards($allHands);
					    $flag = false;
					}    
				}
				
				if($playerNumber == 3)
				{
					array_push($allHands,$player4);
					
					if(($playerNumber+1) == $isLast_num)
					{
					    echocards($allHands);
					    $flag = false;
					}
				}
			}
		}
	}


	if($dupe == false)
	{
	    while($flag) 
	    {
	    
	       $counter_forif = 1;
	    
		    $lastCard = array_pop($myDeck);
		    #Selecting what number the card will be (% 13).
		    $card = $lastCard % 13;
		
			$stuff = $mySuits[ceil($lastCard / 13) - 1];
			//echo "$stuff";
		    #Storing the picture into tempHand variable.
		    $tempHand = "<img class='cards' src='img/$stuff/$card.png'/>";
		
		
    		if($playerNumber == 0)
    		{
    			array_push($player1,$tempHand);
    		}
    		if($playerNumber == 1)
    		{
    			array_push($player2, $tempHand);
    		}
    		if($playerNumber == 2)
    		{
    			array_push($player3, $tempHand);
    		}
    		if($playerNumber == 3)
    		{
    			array_push($player4, $tempHand);
    		}
    		
    		$counter_forif +=1;
    		#Displaying the cards.
		
    		//echo $tempHand;
    		
    		#If it has reached the amount of cards needed, add to allhands, print and jump out of while loop
    		if($counter_forif == $cardNumber)
    		{
    			if($playerNumber == 0)
    			{
    				array_push($allHands,$player1);
    				if(($playerNumber+1) == $isLast_num)
    				{
    				  echocards($allHands);
    				  $flag = false;
    				}
    			}
    		
    			
    			if($playerNumber == 1)
    			{
    				array_push($allHands,$player2);
    				if(($playerNumber+1) == $isLast_num)
    				{
    				   echocards($allHands);
    				   $flag = false;
    			    }
    			}
    			
    			if($playerNumber == 2)
    			{
    				array_push($allHands,$player3);
    				if(($playerNumber+1) == $isLast_num)
    				{
    				    echocards($allHands);
    				    $flag = false;
    			    }
    			}
    			
    			if($playerNumber == 3)
    			{
    
    				array_push($allHands,$player4);
    				
    				if(($playerNumber+1) == $isLast_num)
    				{
    				    echocards($allHands);
    				    $flag = false;
    				}
    			}
	    	}
		}
	}
} //end of function


start();

?>
        
        <footer>

                <hr>
                CST 336 Internet Programming. 2018&copy; Bradley <br />
                <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
                It is used for academic purposes only.
                <figure id="logo">
                    <img src="img/csumblogo.jpg" alt="csumb logo" />
                </figure>
        </footer>
        
    </body>
</html>