<?php
session_start();
require "connexionSQL.php";

$getContactQuery=mysqli_query($connexion,"SELECT friends FROM online_friends WHERE accountId='".$_SESSION["id"]."' ");
while($ContactList=mysqli_fetch_array($getContactQuery, MYSQLI_ASSOC)){
    $list=$ContactList["friends"];
    $myContacts=explode(",",$list);
    foreach ($myContacts as $contact) {
        if($contact!=""){
            $getContactImgQuery=mysqli_query($connexion,"SELECT profilePhoto FROM users_infos WHERE pseudo='$contact' ");
            $ContactImg=mysqli_fetch_array($getContactImgQuery, MYSQLI_ASSOC);
            
            echo '<div class="contacts" onclick="afficher(this)">
                    <span id="contactEsmou">'.$contact.'</span>
                    <span id="taswirtou">
                        <img id="taswirtouDeja" src="'.$ContactImg['profilePhoto'].'">
                    </span>
                </div>';
        }
       
    }
}
exit();
?>