<?php
use function PHPSTORM_META\elementType;

session_start();
error_reporting(0);
if (!isset($_SESSION["usrnm"]) && !isset($_SESSION["psswrd"])) {
    header("Location: my_chata.php");
    exit();
}
include "connexionSQL.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
    <title>WIE</title>
    <link rel="stylesheet" type="text/css" href="home_stupid.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="home.js" defer></script>
    <script src="Ajaxjquery/jquery-3.6.4.min.js" defer></script>
    <script src="ajax.js" defer></script>
</head>
<body>
    <nav class="contact">
        <div id="f1Form">
            <span id="logoImgSpan" onclick="reloadPage()"><img id="logoImg" src="siteLogo2.png" alt=""></span>
            <input class="search_for_friends" name="search_for_friends" type="text" autocomplete="off" maxlength="12" size="20" placeholder="Search in Mychata" required>
            <span id="people" hidden> </span>
            <button class="btn_search" name="btn_search" disabled>Search</button>
        </div>
        <hr class="lg1">
        <header class="title"><h3>Contact</h3></header>
        <div id="contactList">
            <div id="firstContact" onclick="afficher()">
                <span id="contactEsmou"></span>
                <span id="taswirtou"><img id="taswirtou_id" src="" width="55" height="55"><span id="stat"></span></span>
                
            </div>
        </div>
    </nav>
    <div class="chatting">
        <div class="calling_bar" hidden>
            <div class="profile_name_photo">
                <div class="profile_name">
                    <h3 class="person_name"></h3>
                </div>
                <div class="profile_img">
                    <span class="prof_img"><img class="prof_image" src="" ></span>
                </div>
            </div>
            <span class="phone" onclick="Calling()"><img class="ph" src="phone.svg" width="22"></span>
            <span id="infoChatter" onclick="showup()">
                <img src="infoc.svg" width="23" height="23"  >
            </span>
        </div>
        <div id="calling_bar_hidden" >
            <span id="No_user_specified">No user specified</span>
        </div>
        <div class="messaging" hidden>
            <div class="ms1" >

            </div>
            <span class="ifNewMessage">&#8595;</span>
            <div id="dlt_msg" hidden >
                <span>Delete</span>
            </div>
        </div>
        <div id="choose_tochat" >
            <span id="choose_tochat_span">Select a contact</span>
        </div>
        <div id="report" hidden>
            <span id="mute" onclick="muting()">Mute</span>
            <span id="block" onclick="blocking()">Block</span>
        </div>
        <div class="muting" hidden>
            <span>Do you want to mute this user?</span>
            <button id="muted">Yes, i do</button>
            <button onclick="noMuting()">No</button>
        </div>
        <div class="blocking" hidden>
            <span>Do you want to block this user?</span>
            <button id="blocked">Yes, i do</button>
            <button onclick="noBlocking()">No</button>
        </div>
    </div>
    <div id="clear_black" onclick="ToSmall()" >
        <div id="plein_ecran" >
            <img class="bigger_img" src="" alt="">
        </div>
    </div>
    <div class="sending_box">
        <div class="send_m">
            <span class="file_join" onclick="file_upload()"><img draggable="false" src="11.jpg" width="35" ></span>
            <span class="mic" onclick="reg_vcl()"><img id="mic_img" draggable="false" src="microphone.png" width="27"></span>
            <div class="micTrans">
                <i class="cancelRecord" style="display: inline;">&#215;</i>
            </div>
            <input type="file" id="FileUpload1" style="display: none" accept="image/*" onchange="display_Image()">
            <input type="text" class="texting" name="df" placeholder="Aa" autocomplete="off" >
            <div class="file_joined" disabled hidden>
                <a class="remove-image" href="#" onclick="disappear()" style="display: inline;">&#215;</a>
                <output id="output-img">
                    <img id="displayed_img" src="" alt="image_disp">
                </output>
            </div>
            <button class="btn_chat" name="envoyerMES" onclick="myfunction();Sending_msg()" >Send</button>  
        </div>
        <input type="text" id="chatIMG" disabled hidden>
    </div> 
    <div id="music-album">
        <div>

        </div> 
        <div>
            <div id="player-content">
                <div id="album-art">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_1.jpg" class="active" id="_1">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_2.jpg" id="_2">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_3.jpg" id="_3">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_4.jpg" id="_4">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_5.jpg" id="_5">
                    <div id="buffer-box">Buffering ...</div>
                </div>

         </div>
            <div id="player-controls">
                <div id="sus">
                    <div class="control-m">
                        <img id="fas-backward" src="backward-solid.svg">
                    </div>
                    <div class="control-m" id="play-pause-button">
                        <img id="fas-play" src="play-solid.svg">
                    </div>
                    <div class="control-m">
                        <img id="fas-forward" src="forward-solid.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-bar">
        <div class="menu_bar_container">
            <span class="user_photo"><img id="igm" src="profilA.png" width="50" height="50"></span>
            
            <button type="button" class="icon-button" onclick="not_app_diss()">
                <span class="material-icons">notifications</span>
                <span class="icon-button__badge">0</span>
            </button>
            <svg class="id-card" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M528 32H48C21.5 32 0 53.5 0 80v16h576V80c0-26.5-21.5-48-48-48zM0 432c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V128H0v304zm352-232c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zm0 64c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zm0 64c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zM176 192c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zM67.1 396.2C75.5 370.5 99.6 352 128 352h8.2c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h8.2c28.4 0 52.5 18.5 60.9 44.2 3.2 9.9-5.2 19.8-15.6 19.8H82.7c-10.4 0-18.8-10-15.6-19.8z"/></svg>
            <span id="setting_icon"><img src="reglages.png" width="28"> </span>
        </div>
    </div>
    <div class="param" hidden>
        <div id="firstsettparams" >
            <div id="dfgn" hidden>
                <i class="backsbbs" onclick="yalla()">&#8592;</i>
            </div>
            <div id="settingparam1" onclick="transF()">
                <span id="imgs"><img src="setti.png"></span>
                <span id="imgsp">Settings and privacy</span>
                <span id="backArrow" class="backArrowAfter"><img src="arrow-down.png" width="15" height="15"></span>
            </div>
            <div id="settingparam2">
                <span id="imgh"><img src="circl.svg" width="28" height="28"></span>
                <span id="imghw">Donate</span>
                <span id="backArrow" ><img src="arrow-down.png" width="15" height="15"></span>
            </div>
            <div id="settingparam3" onclick="transT()">
                <span id="imgh"><img src="mode-sombre.png" width="28" height="28"></span>
                <span id="imghw">Dark mode</span>
                <span id="backArrow" class="backArrowAfter"><img src="arrow-down.png" width="15" height="15"></span>
            </div>
            <div id="settingparam4">
                <span id="imgh"><img src="infoc.svg" width="28" height="28"></span>
                <span id="imghw">Help</span>
            </div>
            <div id="settingparambtn">
                <button class="logout_btn" onclick="LogOut()">Logout</button>
            </div>
        </div>
        <div id="modesombre">
            <div id="modeSombreEnter">
                <i class="backFromDark" onclick="backFromDark()">&#8592;</i>
            </div>
            <div id="firstparam" onclick="radioAct()">
                <input id="r1" class="rad1" type="radio" name="ddf"><span id="active">Active</span>
            </div>
            <div id="firstparam" onclick="radioINact()">
                <input id="r1" class="rad2" type="radio" name="ddf" checked><span id="active">Inactive</span>
            </div>
        </div>
        <div id="modeParam">
            <div id="modepar3">
                <span id="his"><img src="history.png" width="25" height="25"></span>
                <span id="hisP">Historical activities</span>
            </div>
            <div id="modepar2" onclick="toBlockedUsersPage()">
                <span id="blk"><img src="block-user.png" width="32" height="32"></span>
                <span id="blkP">Blocked contacts</span>
            </div>
            <div id="modepar1">
                <span id="lang"><img src="language.png" width="27" height="27"></span>
                <span id="langP">Language</span>
            </div>
        </div>
    </div>
    <div class="id-box" hidden>
        <span><img id="idPhoto" src="profilA.png" width="61" height="60"></span>
        <list id="lista">
            <p id="li2" style="font-weight: 600;"></p>
            <p id="li1" style="font-weight: 600;"></p>
            <p id="li4" style="font-weight: 600;margin-left:-30px;">Phone number<input id="nmrbtn" type="button" value="+Add" onclick="putnmr()"></p>
            <p id="mynmr" style="font-weight: 600;"></p>
            <p id="li3" style="font-weight: 600;"></p>
        </list>
    </div>  
    <div id="modifyingnmr">
        <div id="Tmpnl" hidden>
            <h4>At least 8 digits(integer)!</h4>
        </div>
        <div id="optionnmr">
            <i class="back_icon8" onclick="hideWithNoMod()">&#8592;</i>
            <input id="codeCountry" type="number" inputmode="numeric" maxlength="6" placeholder="+444">
            <input id="puttingnmr" type="number" inputmode="numeric" placeholder="Your number"><br>
            <button onclick="AddPNumber()">Add</button>
        </div>
    </div>
    <div class="notification" hidden>
        <div class="firstNotif" hidden>
            <div class="AcceptOrRefuse">
                <span class="reqSender" ><img id="imgOfSender" src="" width="50" height="50"></span>
                <span class="reqSenderName"></span>
                <span id="wlh">sent you a friend request</span>
                <input type="text" id="UserAccId" value="" hidden disabled>
                
                <button class="Refuse" onclick="refuseReq()">Refuse</button>
                <button class="Accept" onclick="acceptReq()">Accept</button>
            </div>
            <div class="Accepted" hidden>
                <span class="mt">The request has been accepted!</span>
            </div> 
            <div class="Refused" hidden>
                <span class="mt">The request has been Refused!</span>
            </div> 
        </div>
    </div>
    <div class="changeImgBOX">
        <form class="mainPhotoBox" method="post" enctype="multipart/form-data">
            <i class="back_icon2">&#8592;</i>
            <span class="ommi">
                <img id="photo1" src="profilA.png" name="img_url" width="150" height="150" style="border-radius: 50%;">
            </span>
            <button class="changeimg" type="button">Import a photo</button>
            <a href="#" class="deletephoto">Delete the photo</a>
            <button class="Save" name="insert" onclick="addToStorage()">Apply</button>
            <input id="fileUpload2" type="file" name="image" hidden>
            <input id="PhotoURLInput" type="text" name="NewPhotoURL" hidden>
        </form>
    </div>
    <div class="appllied">
        <p>Applied!</p>
    </div>
    
</body>
</html>
<?php 
echo '<script type="text/javascript">
document.querySelector("#li1").textContent="ID: "+"'.$_SESSION["id"].'";
document.querySelector("#li2").textContent="'.$_SESSION["nommek"].'";
</script>';
$sql_scan = "SELECT * FROM users_infos WHERE pseudo='".$_SESSION["nommek"]."'";
$RES = mysqli_query($connexion, $sql_scan);
$row = mysqli_fetch_array($RES, MYSQLI_ASSOC);
echo '<script type="text/javascript"> 
    document.querySelector("#igm").src="'.$row['profilePhoto'].'";
    document.querySelector("#idPhoto").src="'.$row['profilePhoto'].'";
    document.querySelector("#photo1").src="'.$row['profilePhoto'].'";
</script>';

if ( strlen( $row['request_from'] ) > 1 ) {
    $natija = mysqli_query($connexion,"SELECT accountId FROM users_infos WHERE pseudo='".$row['request_from']."'");
    $colomn=mysqli_fetch_array($natija, MYSQLI_ASSOC);
    echo '<script type="text/javascript"> 
    document.querySelector(".firstNotif").hidden=false;
    document.querySelector("#imgOfSender").src="'.$row['profilePhoto'].'";
    document.querySelector(".reqSenderName").textContent="'.$row['request_from'].'";
    document.querySelector(".icon-button__badge").textContent= parseInt(document.querySelector(".icon-button__badge").textContent)+1;
    document.querySelector("#UserAccId").value="'.$colomn["accountId"].'";
    </script>';
    
    $_SESSION['friend']=$row['request_from'];
}

if (isset($_POST["insert"])) {
    $PhotoURL=mysqli_real_escape_string($connexion, $_POST["NewPhotoURL"]);
    $StoreProfilePhoto="UPDATE users_infos SET profilePhoto='".$PhotoURL."' WHERE accountId='".$_SESSION["id"]."' ";
    $Result = mysqli_query($connexion, $StoreProfilePhoto);
}


exit();
?>