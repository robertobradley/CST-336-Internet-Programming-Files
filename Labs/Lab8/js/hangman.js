// VARIABLES
    var selectedWord = "";
    var selectedHint = "";
    var board = []; //this is an array
    var remainingGuess = 6;
    var words = 
    [{word:"snake", hint:"it's a reptile"},
    {word: "monkey", hint: "it's a mammal"},
    {word: "beetle", hint: "it's an insect"},
    {word: "horse", hint: "You can ride it."},
    {word: "dog", hint: "Can be your best friend"}];
    
    var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                    'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                    'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

// EVENTS/LISTENERS
        window.onload = startGame();
        
    //   $("#letterBtn").click( function(){ 
               
    //              alert( $("#letterBox").val() ); 
                 
    //          } );
             
    $(".letter").click( function() { checkLetter($(this).attr("id"));
    disableButton($(this));
    });
    $(".replayBtn").click(function(){location.reload();});
    $("#hint").click(function(){
    if(remainingGuess > 0)
    {
    $("#word").empty();
    $("#word").append("<br />");
            $("#word").append("<span class = 'hint'>Hint:" + selectedHint + "</span>");
        remainingGuess -= 1;
        updateMan();
        if(remainingGuess <= 0)
             {
                 endGame(false);
             }
    }
    });
        
//FUNCTIONS
        function startGame()
        {
            pickWord();
            initBoard();
            createLetters();
            updateBoard();
        }
        //______________________________________________________________________EOF
        
        function initBoard()
        {
            for(var letter in selectedWord)// in accesses index
            {
                board.push("_");
            }
            
        }
        //______________________________________________________________________EOF
        
        function pickWord()
        {
            var randomInt = Math.floor(Math.random() * words.length); //length to count elements
            selectedWord = words[randomInt].word.toUpperCase();
            selectedHint = words[randomInt].hint;
        }
        //______________________________________________________________________EOF
        
        function updateBoard()
        {
            $("#word").empty();
            
            // for (var letter of board) // of acesses the actual values in the array
            // {
            //     document.getElementById("word").innerHTML += letter + " ";
            // }
            for(var i = 0; i < board.length; i++)
            {
                $("#word").append(board[i]+ " ");
            }
            
        }
        //______________________________________________________________________EOF
        
        function createLetters()
        {
             for(var letter of alphabet)
             {
                 $("#letters").append("<button class = 'letter' id = '" + letter + "'>" + letter + "</button>");
             }
        }
        //______________________________________________________________________EOF
        
        function updateWord(positions,letter)
        {
            for (var pos of positions)
            {
                board[pos] = letter;
            }
            updateBoard();
        }
        
        function checkLetter(letter) //checks to see if the selected letter exists in the selectedWord
        {
            var positions = new Array();
         
         //put all the positions the letter exists in an array
             for (var i = 0; i < selectedWord.length; i++)
             {
                //console.log(selectedWord);
                if(letter == selectedWord[i])
                {
                    positions.push(i);
                }
             }
             
             if (positions.length > 0)
             {
                 updateWord(positions,letter);
                 
                 if(!board.includes('_'))
                 {
                     endGame(true);
                 }
             }
             else
             {
                 remainingGuess -= 1;
                 updateMan();
             }
             if(remainingGuess <= 0)
             {
                 endGame(false);
             }
        }
        //______________________________________________________________________EOF
        
        function updateMan()
        {
            $("#hangImg").attr("src","img/stick_"+(6-remainingGuess)+".png");
        }
        //______________________________________________________________________EOF
        
        function endGame(win)
        {
            $("#letters").hide();
            
            if(win)
            {
                $('#won').show();
            }
            else
            {
                $("#lost").show();
            }
        }
        //______________________________________________________________________EOF
        // Disables the button and changes the style to tell the user it's disabled
        function disableButton(btn)
        {
            btn.prop("disabled",true);
            btn.attr("class", "btn btn-danger");
        }