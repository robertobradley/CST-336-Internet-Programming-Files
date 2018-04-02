<!DOCTYPE html>
<html>
    <head>
        <title> Game Card Generator </title>
    </head>
    <body>
        <header><h1>Game Card Generator</h1></header>
        <div id = "player_drop">
            <form>
                <h4>Number of Players:</h4>
                <select id = 'number_of_players'>
                    <option value = "P1">1 Player</option>
                    <option value = "P2" >2 Player</option>
                    <option value = "P3">3 Player</option>
                    <option value = "P4">4 Player</option>
                    <?php ?>
                </select>
                </br>
                <h4>Number of cards:</h4>
                <input type="button" value="Generate Cards" onclick="displayData()"/>
            </form>
        </div>    
    </body>
</html>