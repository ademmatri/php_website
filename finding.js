
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };

document.querySelector('#move').addEventListener('click', function(){
    if(document.querySelector('#codeverif').value===document.querySelector("#df0").value){
        document.querySelector('#already').setAttribute('style', 'opacity:0;z-index:-1;');
        document.querySelector('#changeform').setAttribute('style', 'opacity:1;z-index:1;')
    }
    else{
        document.querySelector('.nc').hidden=false;
    }
});
document.querySelector('.confirming').addEventListener('input',function(){
    if(document.querySelector('.confirming').value !== document.querySelector('.checking').value){
        document.querySelector('.sdq1').hidden=false;
    }
    else{
        document.querySelector('.sdq1').hidden=true;
        document.querySelector('.batn2').disabled=false;
    }
});
function TakeMeToHomePage() {
    window.location.replace("my_chata.php");
}