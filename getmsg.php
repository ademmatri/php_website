<?php
session_start();
require "connexionSQL.php";
if(isset($_POST["toUserHim"])){
    $fromMe=mysqli_real_escape_string($connexion,$_POST["fromUserMe"]);
    $toHim=mysqli_real_escape_string($connexion,$_POST["toUserHim"]);
    $chat=mysqli_query($connexion,"SELECT * FROM chat WHERE (sender='".$fromMe."' AND intended='".$toHim."') 
    OR 
    (sender='".$toHim."' AND intended='".$fromMe."')");
    while($chatMessages=mysqli_fetch_array($chat,MYSQLI_ASSOC)){
        if($chatMessages["sender_id"]==$_SESSION["id"]){
            if(!empty($chatMessages["msg"])){
                echo '<div style="margin-top:2px;background-color: rgb(154, 76, 226);border-radius:15px 15px 15px 15px;display:block;max-width:240px;padding: 8px 10px 8px 10px;max-height: max-content;clear:both;float:right;">
                <span style="color:white;font-family: sans-serif;font-size:16px;line-break:anywhere;">
                '.$chatMessages["msg"].'
                </span>
                </div>';
            }
            if(!empty($chatMessages["img"])){
                echo '<span style="margin-top:2px;display:block;padding: 8px 10px 8px 10px;clear:right;float:right;">
                <img class="small_image" src="'.$chatMessages["img"].'" style="max-width:120px;max-height:85px;border-radius:5px;" onclick="toBigger(this)">
                </span>';
            }
        }
        else{
            if(!empty($chatMessages["msg"])){
                echo '<div style="margin-top:2px;background-color: #ECECEC;border-radius:15px 15px 15px 15px;display:block;max-width:240px;padding: 8px 10px 8px 10px;max-height:max-content;clear:both;float:left;">
                <span style="color:black;font-family: sans-serif;font-size:16px;line-break:anywhere;">
                '.$chatMessages["msg"].'
                </span>
                </div>';
            }
            if(!empty($chatMessages["img"])){
                echo '<span style="display:block;float:left;">
                <img class="small_image" src="'.$chatMessages["img"].'" style="max-width:100px;max-height:65px;" onclick="toBigger(this)">
                </span>';
            }
        }
    }
}

?>