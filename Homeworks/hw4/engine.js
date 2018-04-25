var monkey_01;
var numHits = 0;
var misses = 0;
var gameTimer;
var endGame = false;

window.onload = init();

$("#monkey_01").mousedown(function(){hitMonkey();});
$("#output").click(function(){
    $("#output").empty();
    numHits = 0;
    misses = 0;
    $("#missed").empty();
    $("#missed").append("Monkeys you've missed: ");
    init();});

function init()
    {
        monkey_01 = $("#monkey_01");
        
        gameTimer = setInterval(gameloop, 50);
        
        placeMonkey();
        
    }

function gameloop()
    {
        //output.innerHTML = output.innerHTML + '* ';
        var y = parseInt(monkey_01.css("top")) - 20;
        if(y < -100) 
        {
            placeMonkey();
            misses++;
            $("#missed").empty();
            $("#missed").append("Monkeys you've missed: " + misses);
            if(misses == 5)
            {
                alert('You lose!');
                clearInterval(gameTimer);
                $("#output").append("<input id = 'button' type='button' value='Play again'>");
            }
        }
        else 
        {
            monkey_01.css("top", y + "px");
        }
    }

function placeMonkey()
    {
        var x = Math.floor(Math.random()*421); // 0 -> 420
        monkey_01.css("left",x + "px");
        monkey_01.css("top", "350px");
    }
    
    function hitMonkey()
    {
        //output.innerHTML = "No animals are harmed in the playing of this game.";
        numHits ++;
        //output.innerHTML = numHits;
        if(numHits==3) 
        {
            alert('You win!');
            clearInterval(gameTimer);
            $("#output").append("<input id = 'button' type='button' value='Play again'>");
        }
        placeMonkey();
       
    }
    