<?php

session_start();
require "connexionSQL.php";
if (isset($_POST["detecting"])) {
    $detected=mysqli_real_escape_string($connexion,$_POST["detecting"]);
    $disc="UPDATE users_infos SET status='".$detected."' WHERE accountId='".$_SESSION["id"]."'";
    $reaction = mysqli_query($connexion, $disc); 
    echo '<script>alert("connec");</script>';
}
exit();

?>