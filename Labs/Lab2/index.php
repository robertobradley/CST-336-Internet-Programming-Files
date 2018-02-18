<?php
    include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab2: 777 Slot Machine </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
    </head>
<body>
    
    <div id = "main">
        <?php
        
        play();
        
        ?>
        <form>
            <input type="submit" value = "Spin!"/>
        </form>
<!--
        <img src="img/lemon.png" width = "70" alt = "lemon pic" title= "lemon" />
        <img src="img/cherry.png" width = "70" alt = "cherry pic" title= "cherry" />
        <img src="img/orange.png" width = "70" alt = "orange" title= "orange" />
-->
    </div>
    </br>
    </br>
    </br>
    <footer>
        <figure id="logo">
            <img src="img/csumblogo.jpg" alt="csumb logo" />
        </figure>
            <hr>
                CST 336 Internet Programming. 2018&copy; Bradley <br />
                <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
                It is used for academic purposes only.
    </footer>
</body>
</html>