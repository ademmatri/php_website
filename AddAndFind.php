<?php
session_start();
require "connexionSQL.php";
if (isset($_POST["suggest"])) {
    $existingNames=array();
    $name=mysqli_real_escape_string($connexion,$_POST["suggest"]);
    $chercher="SELECT * FROM users_infos WHERE pseudo LIKE '$name%' AND pseudo <>'".$_SESSION["nommek"]."'";
    $resultat = mysqli_query($connexion, $chercher);
    while ($row=mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
        array_push($existingNames,$row["pseudo"]);
    }
    if (!empty($name)){
        foreach($existingNames as $existingName){
            if(strpos($existingName,$name)!==false){
                $resultat8= mysqli_query($connexion,"SELECT profilePhoto FROM users_infos WHERE pseudo LIKE '$existingName%'");
                $conse=mysqli_fetch_array($resultat8, MYSQLI_ASSOC);
                echo '<div id="searchRES" style="border-radius:5px;display:block;position:relative;padding:5px 0px 0px 5px;cursor:pointer;"><img style="border-radius:50%;width:50px;height:50px;" src="'.$conse["profilePhoto"].'">
                <span id="tt" style="position:absolute;color:black;margin-left:10px;margin-top:15px;">'.$existingName.'</span>
                </div>';
                echo '<br>';
            }
        }
    }
    exit();
}
if (isset($_POST["newRequest"])) {
    $PreviousFriends=array();
    $newFriend=mysqli_real_escape_string($connexion,$_POST["newRequest"]);
    $collectPrevFriends="SELECT friends FROM online_friends WHERE accountId='".$_SESSION["id"]."' ";
    $consequence1=mysqli_query($connexion, $collectPrevFriends);
    while ($row=mysqli_fetch_array($consequence1, MYSQLI_ASSOC)) {
        array_push($PreviousFriends,$row["friends"]);
    }
    $newList=array_push($PreviousFriends,$newFriend);
    $implodedArray = implode(",",$PreviousFriends);
    $add_friend="UPDATE online_friends SET friends='".$implodedArray."' WHERE accountId='".$_SESSION["id"]."'";
    $effacer="UPDATE users_infos SET request_from='' WHERE accountId='".$_SESSION["id"]."' ";
    $consequence2=mysqli_query($connexion, $add_friend);
    $outcome=mysqli_query($connexion, $effacer);
    exit();
}
if(isset($_POST["ct"])){
    $newBlockedCt=mysqli_real_escape_string($connexion,$_POST["ct"]);
    $PrevFriends="SELECT friends FROM online_friends WHERE accountId='".$_SESSION["id"]."' ";
    $consequence4=mysqli_query($connexion, $PrevFriends);
    while ($row=mysqli_fetch_array($consequence4, MYSQLI_ASSOC)) {
        $chaine=$row["friends"];
        $string=str_replace(",$newBlockedCt","",$chaine);
        $add_the_block_ct=mysqli_query($connexion,"UPDATE online_friends SET friends='$string' WHERE accountId='".$_SESSION["id"]."'");
    }
    

    exit();
}



if (isset($_POST["refused"])) {
    $declinedContact=mysqli_real_escape_string($connexion,$_POST["refused"]);
    $decline="UPDATE users_infos SET request_from='' WHERE accountId='".$_SESSION["id"]."'";
    $consequence3=mysqli_query($connexion, $decline);
    exit();
}
?>