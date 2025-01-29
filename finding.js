
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };

document.querySelector('#move').addEventListener('click', function(){
    if(document.querySelector('#codeverif').value===document.querySelector("#df0").value){
        document.querySelector('#already').setAttribute('style', 'opacity:0;z-index:-1;');
        document.querySelector('#done-reset').setAttribute('style', 'opacity:1;z-index:1;')
    }
    else{
        document.querySelector('.nc').textContent="Code is incorrect!";
    }
});

function TakeMeToHomePage() {
    window.location.replace("my_chata.php");
}
