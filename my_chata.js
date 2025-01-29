var _0x33d6=["\x2E\x62\x34","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x2E\x62\x61\x63\x6B\x5F\x69\x63\x6F\x6E","\x2E\x64\x69\x76\x32","\x63\x6C\x69\x63\x6B","\x68\x69\x64\x64\x65\x6E","\x61\x63\x74\x69\x76\x65","\x61\x64\x64","\x63\x6C\x61\x73\x73\x4C\x69\x73\x74","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x72\x65\x6D\x6F\x76\x65","\x62\x31","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x43\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x6C\x6F\x61\x64\x69\x6E\x67","\x73\x75\x63\x63\x65\x73\x73","\x70\x61\x73\x73\x77\x6F\x72\x64","\x63\x6F\x6E\x66\x69\x72\x6D\x5F\x70\x61\x73\x73\x77\x6F\x72\x64","\x76\x61\x6C\x75\x65","\x50\x61\x73\x73\x77\x6F\x72\x64\x73\x20\x44\x6F\x6E\x27\x74\x20\x4D\x61\x74\x63\x68","\x73\x65\x74\x43\x75\x73\x74\x6F\x6D\x56\x61\x6C\x69\x64\x69\x74\x79","","\x6F\x6E\x63\x68\x61\x6E\x67\x65","\x6F\x6E\x6B\x65\x79\x75\x70"];const signinBtn=document[_0x33d6[1]](_0x33d6[0]);const backicon=document[_0x33d6[1]](_0x33d6[2]);const popupBox=document[_0x33d6[1]](_0x33d6[3]);const fleche=document[_0x33d6[1]](_0x33d6[2]);signinBtn[_0x33d6[9]](_0x33d6[4],()=>{fleche[_0x33d6[5]]= false;popupBox[_0x33d6[8]][_0x33d6[7]](_0x33d6[6])});backicon[_0x33d6[9]](_0x33d6[4],()=>{popupBox[_0x33d6[8]][_0x33d6[10]](_0x33d6[6]);fleche[_0x33d6[5]]= true});const button=document[_0x33d6[12]](_0x33d6[11])[0];button[_0x33d6[9]](_0x33d6[4],function(){button[_0x33d6[8]][_0x33d6[7]](_0x33d6[13]);setTimeout(function(){button[_0x33d6[8]][_0x33d6[10]](_0x33d6[13]);button[_0x33d6[8]][_0x33d6[7]](_0x33d6[14]);setTimeout(function(){button[_0x33d6[8]][_0x33d6[10]](_0x33d6[14])},2000)},3000)});var password=document[_0x33d6[12]](_0x33d6[15]),confirm_password=document[_0x33d6[12]](_0x33d6[16]);function validatePassword(){if(password[_0x33d6[17]]!= confirm_password[_0x33d6[17]]){confirm_password[_0x33d6[19]](_0x33d6[18])}else {confirm_password[_0x33d6[19]](_0x33d6[20])}}password[_0x33d6[21]]= validatePassword;confirm_password[_0x33d6[22]]= validatePassword
function between(min, max) {  
    return Math.floor(
      Math.random() * (max - min) + min
    )
}
let codo = between(100000, 999999);
sessionStorage.setItem('code',codo);
document.querySelector('.otp_calcul').setAttribute('value',codo);
function saveInSession(){
  let tn=document.querySelector('#userName').value;
  let ts= document.querySelector('.idn1').value;
  sessionStorage.setItem('UserName',tn+' '+ts);
}
function showSignInfo() {
  document.querySelector(".infoSignupMsg").hidden=false;
}
function hideSignInfo(){
  document.querySelector(".infoSignupMsg").hidden=true;
}
function topscroll(){
  window.scrollTo({
    top:0,
    behavior:'smooth'
  });

}
