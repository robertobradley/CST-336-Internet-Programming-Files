<?php
$_GET['number_of_players'];

//creating number of players
for($i = 0; $i < 4; $i++)
{
 array_push($_GET['number_of_players'],$i);    
}

//creating array of numbers to choose cards
$myDeck = array();
for ($i = 1; $i < 53; $i++) {
	array_push($myDeck, $i);
}


function draw_cards($player_nums)
{
    
}

function exclude_suit()
{
    
}

function duplicates(true)
{
    
}





?>