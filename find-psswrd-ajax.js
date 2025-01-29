$(document).ready(function(){
    $(".btn_search").click(function(){
        var email=$(".input_text").val();
        $.post("find-email-in-database.php",{
            Email:email
        },
        function(data){
            if(data=="submit"){
                $(".real-search").click();
            }
            else{
                $("#nobb").text(data);
            }
            
        });
    });
    
    
});