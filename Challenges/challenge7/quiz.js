$(document).ready(function()
{
    $("#submitBtn").click(function()
    {
        if ($("#q1").val().toUpperCase() == "SACRAMENTO")
        {
            $("#feedback1").empty();
            $("#feedback1").append("<h4 style='color: green'>Correct !</h4>");
        }
        else 
        {
            $("#feedback1").empty();
            $("#feedback1").append("<h4 style='color: red'>Incorrect ! The Capital of California is Sacramento</h4>");
        }
        if ($("#q2").val() == "Bear")
        {
            $("#feedback2").empty();
            $("#feedback2").append("<h4 style='color: green'>Correct !</h4>");
        }
        else 
        {
            $("#feedback2").empty();
            $("#feedback2").append("<h4 style='color: red'>Incorrect ! The animal on the California Flag is a Bear</h4>");
        }
        
    });
});

