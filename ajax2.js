$(document).ready(function(){
    var searchedUser=sessionStorage.getItem("sea");
    
    $.post("sendingsearchajax.php",{
        search_for_friends:searchedUser
    },
    function(data){
        $("#sec_list").html(data);
    });
    const online="on";
    const offline="off";

    $(window).on("beforeunload",function(){
        $.post("OnOffLine.php",{
            detecting:offline
        });
    });
    if (navigator.onLine===true) {
        $.post("OnOffLine.php",{
            detecting:online
        });
    }
});
function hob(thatElem){
    let x=thatElem.previousElementSibling.textContent;
    document.cookie = "MYJAVVAR = " + x;  
}