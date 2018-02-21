<?php

//Arrays for later use
$cards = array();
$win_phrases = array("<p>You Won 230 bucks. Good Job!</p>", "<p>Here's your 30 smacks in dough.</p>", "<p>Hope you enjoy that extra 5 dollars</p>","<p>I cannot believe you won 1000 macaroons!</p>");
$lose_phrases = array("<p>You lost, sorry chump.</p>","<p>You lost, You're kind of bad at this.</p>", "<p>Sorry about your loss</p>","<p>Betting your house wasn't a good idea.</p>");
$random_keys = array_rand($lose_phrases,3);

//Players Random card values
$randcardVal1 = rand(1,52);
do {
$randcardVal2 = rand(1,52);
}
while($randcardVal1==$randcardVal2);

//Computers Random Card values
$C_randval1 = rand(1,52);
do {
$C_randval2 = rand(1,52);
}
while($C_randval1==$C_randval2);

echo "<header> <h1> Mafia Black Jack </h1> </header>";

function display_cards($randcardVal1,$randcardVal2,$cards)
{
   echo "<img class = 'cards' src = 'img/".$cards[$randcardVal1-1].".png'/>";
   echo "<img class = 'cards' src = 'img/".$cards[$randcardVal2-1].".png'/></br></br>";
}

for($i = 1; $i < 53;$i++)
{
    array_push($cards, $i);
}


//----------------> Player Cards Values <---------------\\
//for calculating the cards
$P_sum = 0;
$P_acesum1 = 0;
$P_acesum2 = 0;

// if's for aces
if(($randcardVal1 % 13) == 1)
{
    $P_acesum1 = 1;
    $P_acesum2 = 11;
}
if(($randcardVal2 % 13) == 1)
{
    $P_acesum1 = 1;
    $P_acesum2 = 11;
}

//if's for 10s
if((($randcardVal1 % 13) >= 10) || (($randcardVal1 % 13) == 0))
{
    $P_sum += 10;
}
if((($randcardVal2 % 13) >= 10) || (($randcardVal2 % 13) == 0))
{
    $P_sum += 10;
}

//ifs for everything else
if ((($randcardVal1 % 13) < 10) && (($randcardVal1 % 13) > 1))
{
    $P_sum += ($randcardVal1 % 13);
}
if ((($randcardVal2 % 13) < 10) && (($randcardVal2 % 13) > 1))
{
    $P_sum += ($randcardVal2 % 13);
}

//------------> computers Card Values <----------\\
//for calculating the cards
$C_sum = 0;
$C_acesum1 = 0;
$C_acesum2 = 0;

// if's for aces
if(($C_randval1 % 13) == 1)
{
    $C_acesum1 = 1;
    $C_acesum2 = 11;
}
if(($C_randval2 % 13) == 1)
{
    $C_acesum1 = 1;
    $C_acesum2 = 11;
}

//if's for 10s
if((($C_randval1 % 13) >= 10) || (($C_randval1 % 13) == 0))
{
    $C_sum += 10;
}
if((($C_randval2 % 13) >= 10) || (($C_randval2 % 13) == 0))
{
    $C_sum += 10;
}

//ifs for everything else
if ((($C_randval1 % 13) < 10) && (($C_randval1 % 13) > 1))
{
    $C_sum += ($C_randval1 % 13);
}
if ((($C_randval2 % 13) < 10) && (($C_randval2 % 13) > 1))
{
    $C_sum += ($C_randval2 % 13);
}

$P_total = 0;
$C_total = 0;

//adding up the biggest total  player values for accuracy
if($P_sum + $P_acesum1 > $P_sum + $P_acesum2)
{
    $P_total = ($P_sum + $P_acesum1);
}
else
{
    $P_total = ($P_sum + $P_acesum2);
}


//adding up the biggest total computer values for accuracy
if($C_sum + $C_acesum1 > $C_sum + $C_acesum2)
{
    $C_total = ($C_sum + $C_acesum1);
}
else
{
    $C_total = ($C_sum + $C_acesum2);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
             @import url("css/styles.css");
        </style>
    </head>
    <body>
<?php
//displaying all cards
echo "<div id = 'display1'>".display_cards($randcardVal1,$randcardVal2,$cards)."".display_cards($C_randval1,$C_randval2,$cards)."</div>";
echo "<<h5>player's score: ".$P_total."</h5>";
echo "<<h5>Mobster's Score: ".$C_total." </h5>"; 


//determining winner

if($P_total == $C_total)
{
    echo $lose_phrases[$random_keys[0]];
}

if($P_total > 21 )
{
   shuffle($win_phrases);
   echo "</br>";
    echo $win_phrases[0]; 
}
if ($C_total > 21)
{
    echo "</br>";
    echo $lose_phrases[$random_keys[0]];
}


if($P_total > $C_total && $P_total < 22)
{
    echo "</br>";
    shuffle($win_phrases);
    echo $win_phrases[0];
}

if($C_total > $P_total && $C_total < 22)
{
    echo "</br>";
    echo $lose_phrases[$random_keys[0]];
}


?>
    </body>
     <footer>
            <figure id="logo">
                <img src="img/csumblogo.jpg" alt="csumb logo" />
            </figure>
                CST 336 Internet Programming. 2018&copy; Bradley <br />
                <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
                It is used for academic purposes only.
            </footer>
</html>