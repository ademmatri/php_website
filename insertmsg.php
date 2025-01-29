<?php

session_start();
require "connexionSQL.php";
if (isset($_POST["msg"])) {
    $intended=mysqli_real_escape_string($connexion,$_POST["toUser"]);
    $message=mysqli_real_escape_string($connexion,$_POST["msg"]);
    $image=mysqli_real_escape_string($connexion,$_POST["img"]);
    $finalResult=mysqli_query($connexion,"INSERT INTO chat(sender,sender_id,intended,intended_id,msg,img) VALUES ('".$_SESSION["nommek"]."','".$_SESSION["id"]."','$intended','','$message','$image')");
}

?>