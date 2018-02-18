<?php

$cards =  array("ace","one",2);
//print_r($cards); //for debugging purposes, shows all elements in array.

//echo $cards[0];

$cards[] = "jack"; // adds new element at the end of the array
array_push($cards, "queen", "king");



$cards[2] ="ten";

//displayCard($card[2]);
print_r($cards);
echo "<hr>";
print_r($cards);

unset($cards[1]); //removes element from array
echo "<hr>";
print_r($cards);

$cards = array_values($cards);
echo "<hr>";
print_r($cards);

shuffle($cards);
echo "<hr>";
print_r($cards);
echo "<hr>";

$randomIndex = rand($cards); //getting random index
displayCard($cards[$randomIndex]);



$lastCard = array_pop($cards);
//print_r($cards);
function displayCard($lastCard)
{
    
    //echo "<img src = '../Challenges/cards/clubs/$cards[$cardstring].png' />";
    //global $cards;
    echo "<img src = '../Challenges/cards/clubs/$cards[$card].png' />";
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>