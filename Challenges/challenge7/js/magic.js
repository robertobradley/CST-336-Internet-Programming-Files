$(document).ready(function()
{
    var currentImg = "img/now_you_see_me.png";
    $("#btn").click(function()
    {
        if($("#cat").attr("src") == currentImg)
        {
            hideCat();
        }
        else 
        {
            showCat();
        }
        
        //alert("Im working");
    });
    function hideCat()
    {
        $("#cat").attr("src", "img/now_you_dont.png");
        $("#state").empty();
        $("#state").append("<h3>Now you don't</h3>");
        $("#btn").empty();
        $("#btn").append("Reappear");
    }
    function showCat()
    {
        $("#cat").attr("src", "img/now_you_see_me.png");
        $("#state").empty();
        $("#state").append("<h3>Now you see mee ...</h3>");
        $("#btn").empty();
        $("#btn").append("Do Magic !");
    }
});

