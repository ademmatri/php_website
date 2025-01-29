var _0x78ac=["\x2E\x74\x65\x78\x74\x69\x6E\x67","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x76\x61\x6C\x75\x65","","\x59\x6F\x75\x20\x64\x69\x64\x20\x6E\x6F\x74\x20\x77\x72\x69\x74\x65\x20\x61\x6E\x79\x74\x68\x69\x6E\x67\x20\x21","\x23\x46\x69\x6C\x65\x55\x70\x6C\x6F\x61\x64\x31","\x63\x6C\x69\x63\x6B","\x2E\x6D\x69\x63","\x2E\x66\x69\x6C\x65\x5F\x6A\x6F\x69\x6E","\x2E\x66\x69\x6C\x65\x5F\x6A\x6F\x69\x6E\x65\x64","\x63\x68\x61\x6E\x67\x65","\x68\x69\x64\x64\x65\x6E","\x73\x74\x79\x6C\x65","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x2D\x31\x35\x36\x70\x78\x3B\x68\x65\x69\x67\x68\x74\x3A\x36\x30\x70\x78\x3B\x6D\x61\x72\x67\x69\x6E\x2D\x74\x6F\x70\x3A\x37\x70\x78\x3B","\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x20\x2D\x31\x39\x30\x70\x78\x3B","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x20\x2D\x32\x34\x30\x70\x78\x3B","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x72\x65\x6D\x6F\x76\x65\x2D\x69\x6D\x61\x67\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x43\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x30\x70\x78\x3B\x68\x65\x69\x67\x68\x74\x3A\x36\x30\x70\x78\x3B\x6D\x61\x72\x67\x69\x6E\x2D\x74\x6F\x70\x3A\x37\x70\x78\x3B","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x20\x2D\x31\x30\x30\x70\x78\x3B","\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x20\x2D\x31\x34\x35\x70\x78\x3B"];var nameInput=document[_0x78ac[1]](_0x78ac[0]);var img=document[_0x78ac[1]](_0x78ac[5]);function file_upload(){img[_0x78ac[6]]()}var mic=document[_0x78ac[1]](_0x78ac[7]);var file_join=document[_0x78ac[1]](_0x78ac[8]);var file_joined=document[_0x78ac[1]](_0x78ac[9]);img[_0x78ac[17]](_0x78ac[10],function(){file_joined[_0x78ac[11]]= false;file_joined[_0x78ac[14]](_0x78ac[12],_0x78ac[13]);mic[_0x78ac[14]](_0x78ac[12],_0x78ac[15]);file_join[_0x78ac[14]](_0x78ac[12],_0x78ac[16])});const x=document[_0x78ac[19]](_0x78ac[18]);function disappear(){file_joined[_0x78ac[11]]= true;file_joined[_0x78ac[14]](_0x78ac[12],_0x78ac[20]);mic[_0x78ac[14]](_0x78ac[12],_0x78ac[21]);file_join[_0x78ac[14]](_0x78ac[12],_0x78ac[22])}
document.querySelector('.id-card').onclick=function(){
    if (document.querySelector('.id-box').hidden===true) {
        document.querySelector('.id-box').hidden=false;
        if (document.querySelector('.param').hidden===false) {
            document.querySelector('.param').hidden=true;
        }
        if (document.querySelector('.notification').hidden===false) {
            document.querySelector('.notification').hidden=true;
        }
    }
    else{
        document.querySelector('.id-box').hidden=true;
    }
};
let LEVEL="Level: "+ "I" ;
document.querySelector('#li3').textContent=LEVEL;
function LogOut(){
    window.location="phpfiles/logout.php";
}
function not_app_diss() {
    const tt=document.querySelector('.notification');
    if(tt.hidden===false){
        tt.hidden=true;
    }
    else{
        tt.hidden=false;
        if (document.querySelector('.param').hidden===false) {
            document.querySelector('.param').hidden=true;
        }
        if (document.querySelector('.id-box').hidden===false) {
            document.querySelector('.id-box').hidden=true;
        }
    }
}
document.querySelector('#setting_icon').onclick=function(){
    if(document.querySelector('.param').hidden===true){
        document.querySelector('.param').hidden=false;
        if (document.querySelector('.id-box').hidden===false) {
            document.querySelector('.id-box').hidden=true;
        }
        if (document.querySelector('.notification').hidden===false) {
            document.querySelector('.notification').hidden=true;
        }
    }
    else{
         document.querySelector('.param').hidden=true;
    }
}
const btn_search=document.querySelector('.btn_search');
const search_for_friends=document.querySelector('.search_for_friends');
search_for_friends.addEventListener('input',function(){
    if (search_for_friends.value.length>0) {
        btn_search.disabled=false;
    }
    else{
        btn_search.disabled=true;
    }
});
document.querySelector('.user_photo').addEventListener('click', function () {
    
    document.querySelector('.changeImgBOX').setAttribute('style', 'z-index: 1;opacity:1;');  
});
document.querySelector('.back_icon2').addEventListener('click', function () {
    
    document.querySelector('.changeImgBOX').setAttribute('style', 'z-index: -1;opacity:0;');
});
document.querySelector('.deletephoto').addEventListener('click', function () {
    
    igm.setAttribute('src','profilA.png');
    photo1.setAttribute('src','profilA.png');
    localStorage.removeItem('mypp');
});
const changeimg=document.querySelector('.changeimg');
const fileUpload2=document.querySelector('#fileUpload2');
const igm=document.querySelector('#igm');
const photo1=document.querySelector('#photo1');
const idBoxPhoto=document.querySelector("#idPhoto");
changeimg.addEventListener('click',function(){
    fileUpload2.click();
});
fileUpload2.addEventListener('change', function(){
    var choosedFile= this.files[0];
    if (choosedFile){
        var reader=new FileReader();
        reader.addEventListener('load', function(){
            localStorage.setItem('mypp', reader.result);
            photo1.setAttribute('src',reader.result);
            igm.setAttribute('src',reader.result);
            idBoxPhoto.setAttribute('src',reader.result)
            document.querySelector('#PhotoURLInput').value=reader.result;
        });
        reader.readAsDataURL(choosedFile);
    }
});

function bye() {
    document.querySelector('.appllied').setAttribute('style','z-index:-1;opacity:0;');
}
function addToStorage() {
    document.querySelector('.changeImgBOX').setAttribute('style','z-index:-1;opacity:0;');
    document.querySelector('.appllied').setAttribute('style','z-index:1;opacity:1;');
    setTimeout(bye,1500);
}
function AddPNumber() {
    let mynmr=document.querySelector('#puttingnmr').value;
    let Ccode=document.querySelector('#codeCountry').value;
    if (mynmr.length>=8 && Ccode.length>1 && mynmr.indexOf(".")===-1) {
        document.querySelector('#mynmr').textContent= mynmr;
        document.querySelector('#nmrbtn').setAttribute('value',"change");
        document.querySelector('#modifyingnmr').setAttribute('style',"z-index:-1;opacity:0;");
    }
    else{
        document.querySelector('#Tmpnl').hidden=false;
        setTimeout("document.querySelector('#Tmpnl').hidden=true",2500);
    }
}
function putnmr(){
    document.querySelector('#modifyingnmr').setAttribute('style', "z-index:1;opacity:1;");
}
function hideWithNoMod(){
    document.querySelector('#modifyingnmr').setAttribute('style',"z-index:-1;opacity:0;");
}
if (localStorage.getItem('MdDark')===true) {
    document.querySelector('.rad1').checked=true;
}
function transT() {
    document.querySelector('#settingparam3').setAttribute('style', "transform:translate(0px,-80px);background-color:#00000017;");
    document.querySelector('.backArrowAfter').setAttribute('style', "transform:rotate(0deg);");
    document.querySelector('#settingparam4').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparam2').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparam1').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparambtn').setAttribute('style', "opacity:0;");
    document.querySelector('#modesombre').setAttribute('style', "opacity:1;z-index:1;"); 
}
function radioAct(){
    document.querySelector('.rad1').checked=true;
    localStorage.setItem('mdDark',true);
}
function radioINact(){
    document.querySelector('.rad2').checked=true;
    localStorage.setItem('mdDark', false);
}
function backFromDark() {
    document.querySelector('#settingparam3').setAttribute('style', "transform:translate(0px,0px);");
    document.querySelector('.backArrowAfter').setAttribute('style', "transform:rotate(180deg);");
    document.querySelector('#settingparam4').setAttribute('style', "opacity:1;");
    document.querySelector('#settingparam2').setAttribute('style', "opacity:1;");
    document.querySelector('#settingparam1').setAttribute('style', "opacity:1;");
    document.querySelector('#settingparambtn').setAttribute('style', "opacity:1;");
    document.querySelector('#modesombre').setAttribute('style', "opacity:0;z-index:-1;"); 
}
function reg_vcl() {
    document.querySelector('#mic_img').classList.toggle("registring_vocal");
    document.querySelector('.micTrans').classList.toggle("grow");
}
document.querySelector(".ms1").addEventListener("scroll",function(){
    var oldScrollY = document.querySelector(".ms1").scrollY;
    if(oldScrollY < document.querySelector(".ms1").scrollY){
        console.log("down");
    }
    oldScrollY = document.querySelector(".ms1").scrollY;
});
function myfunction(){
    if(nameInput[_0x78ac[2]]== _0x78ac[3] && document.querySelector('#FileUpload1').files.length === 0){
        alert(_0x78ac[4])
    }
}
function Sending_msg() {
    if (document.querySelector('#FileUpload1').files.length!==0) {
        document.querySelector('#FileUpload1').value=null;
        disappear();
    }
}
function toBigger(element){
    document.querySelector('.bigger_img').src=element.src;
    document.querySelector('#clear_black').setAttribute('style',"opacity:1; z-index:1; transition:0.15s;");
}
function ToSmall() {
    document.querySelector('#clear_black').setAttribute('style',"opacity:0; z-index:-1; transition:0.1s;");
}
document.querySelector(".texting").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      if (document.querySelector(".texting").value.length>=1) {
        document.querySelector(".btn_chat").click();
        Sending_msg();
      }
    }
});
document.querySelector(".search_for_friends").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        document.querySelector(".btn_search").click();
    }
});
function transF() {
    document.querySelector('#settingparam2').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparam3').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparam4').setAttribute('style', "opacity:0;");
    document.querySelector('#settingparam1').setAttribute('style', "background-color:#00000017;transform:translate(0px,20px);");
    document.querySelector('#modeParam').setAttribute('style', "z-index:1;opacity:1;");
    document.querySelector('#dfgn').hidden=false;
    document.querySelector('.backArrowAfter').setAttribute('style',"transform:rotate(360deg);");
}
function yalla(){
    document.querySelector('#modeParam').setAttribute('style',"z-index:-1;opacity:0");
    document.querySelector('#settingparam1').setAttribute('style',"transform:translate(0px,0px);");
    document.querySelector('#dfgn').hidden=true;
    document.querySelector('#settingparam2').setAttribute('style',"opacity:1;z-index:1;");
    document.querySelector('#settingparam3').setAttribute('style',"opacity:1;z-index:1;");
    document.querySelector('#settingparam4').setAttribute('style',"opacity:1;z-index:1;");
    document.querySelector('.backArrowAfter').setAttribute('style',"transform:rotate(180deg);");
}
function acceptReq() {
    document.querySelector(".AcceptOrRefuse").hidden=true;
    document.querySelector(".Accepted").hidden=false;
    document.querySelector(".icon-button__badge").textContent= parseInt(document.querySelector(".icon-button__badge").textContent)-1;
    if (localStorage.getItem("Cts")===null) {
        localStorage.setItem("Cts",[]);
    }
    const oldStor=localStorage.getItem("Cts");
    const newStor=window.btoa(document.querySelector('.reqSenderName').textContent);
    localStorage.setItem("Cts",oldStor+","+ newStor);
    var newDiv=document.createElement("div");
    var newSpan=document.createElement("span");
    var statSpan=document.createElement("span");
    statSpan.setAttribute('id','stat');
    newSpan.setAttribute('id','taswirtou');
    var newimg=document.createElement("img");
    newimg.setAttribute('id','taswirtouDeja');
    newimg.setAttribute('style','width:50px;height:50px;border-radius:50%;');
    newimg.setAttribute('src',document.querySelector('#imgOfSender').src);
    var newSpan2=document.createElement("span");
    newSpan2.setAttribute('id','contactEsmou');
    newSpan2.textContent=document.querySelector('.reqSenderName').textContent;
    newSpan.append(newimg);
    newSpan.append(statSpan);
    newDiv.append(newSpan);
    newDiv.append(newSpan2);
    newDiv.setAttribute('onclick','specifyUser(this)');
    newDiv.setAttribute('class','contacts');
    document.querySelector("#contactList").appendChild(newDiv);
}
function specifyUser(elem){
    document.querySelector(".person_name").textContent=elem.textContent;
    document.querySelector("#calling_bar_hidden").hidden=true;
    document.querySelector("#choose_tochat").hidden=true;
    document.querySelector(".calling_bar").hidden=false;
    document.querySelector(".messaging").hidden=false;
    document.querySelector(".btn_chat").disabled=false;
    document.querySelector(".texting").disabled=false;
}
function reloadPage() {
    window.location.reload();
}
function refuseReq() {
    document.querySelector(".AcceptOrRefuse").hidden=true;
    document.querySelector(".Refused").hidden=false;
    document.querySelector(".icon-button__badge").textContent= parseInt(document.querySelector(".icon-button__badge").textContent)-1;
}
function display_Image(){
    const file = document.querySelector('#FileUpload1').files;
    document.querySelector('#displayed_img').src=URL.createObjectURL(file[0]);
}
function afficher(thisElement) {
    console.log(thisElement.childNodes[1].textContent);
    document.querySelector('.person_name').textContent=thisElement.firstElementChild.textContent;
    document.querySelector('.prof_image').src=thisElement.lastElementChild.firstElementChild.src;
    document.querySelector(".messaging").hidden=false;
    document.querySelector(".calling_bar").hidden=false;
    document.querySelector("#calling_bar_hidden").hidden=true;
    document.querySelector("#choose_tochat").hidden=true;
    
}

function showup(){
    const report=document.querySelector("#report");
    const mut=document.querySelector('.muting');
    const blk=document.querySelector('.blocking');
    if (report.hidden===true) {
        blk.hidden=true;
        mut.hidden=true;
        report.hidden=false;
    }
    else{
        report.hidden=true;
    }  
}
function muting() {
    document.querySelector('.muting').hidden=false;
    document.querySelector('#report').hidden=true;  
}
function noMuting() {
    document.querySelector('.muting').hidden=true;
}
function blocking() {
    document.querySelector('.blocking').hidden=false;
    document.querySelector('#report').hidden=true;
}
function noBlocking() {
    document.querySelector('.blocking').hidden=true;
}
let myCallingWindow;
function Calling() {
    alert("The calling system will be available soon");
    /*myCallingWindow=window.open("calling.html","_blank","top=100,left=300,width=700,height=500" );
    document.querySelector('#circle_img').src=document.querySelector('.prof_image').src;*/
    
}
function FinishCalling() {
    document.querySelector('#audio').pause();
    document.querySelector('#audio').currentTime = 0;
    document.querySelector("#cll").textContent="Call ended";
    document.querySelector('.skipping_btn').hidden=true;
    document.querySelector('.close-mic').hidden=true;
}

function CloseMic() {
    if (document.querySelector('#closed_mic_span').hidden===false) {
        document.querySelector('#closed_mic_span').hidden=true;
    }
    else {
        document.querySelector('#closed_mic_span').hidden=false;
    }
}
function toBlockedUsersPage() {
    window.location.href="blockedUsers.html";
}