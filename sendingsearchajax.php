<?php
session_start();
require "connexionSQL.php";

if(isset($_POST["btnAdd"])){
    $maksod= $_COOKIE['MYJAVVAR'];
    $implementation = mysqli_query($connexion,"UPDATE users_infos SET request_from ='".$_SESSION["nommek"]."' WHERE pseudo='$maksod'");
    header("Location: afterRequest.html");
    exit();
}
if(isset($_POST["search_for_friends"])){
    $accountToFind = mysqli_real_escape_string($connexion, $_POST["search_for_friends"]);
    $resultat = mysqli_query($connexion,"SELECT pseudo FROM users_infos WHERE pseudo LIKE '$accountToFind%' ");
    while($rowa = mysqli_fetch_array($resultat,MYSQLI_ASSOC)){
        foreach ($rowa as $name) {
            $resultatInfinity = mysqli_query($connexion,"SELECT profilePhoto FROM users_infos WHERE pseudo LIKE '$name' ");
            $rowa2=mysqli_fetch_array($resultatInfinity,MYSQLI_ASSOC);
            echo'<form id="bar_account" action="sendingsearchajax.php" method="post">
            <span id="frofile_photo"><img id="contactPhoto" src="'.$rowa2['profilePhoto'].'"></span>
            <span id="nom" >'.$name.'</span>
            <button id="btnAdd" name="btnAdd" onclick="hob(this)">
            <img id="addImg" src="ajouami.png">Add
            </button>
            </form>';
        }
    }  
    exit();
}


?>