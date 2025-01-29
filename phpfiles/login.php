<?php
session_start();
require "../connexionSQL.php";
$log_email = mysqli_real_escape_string($connexion, $_POST["log_email"]);
$log_password =mysqli_real_escape_string($connexion, $_POST["log_password"]);
if (isset($log_email) && isset($log_password)) {
    $sql_login = "SELECT * FROM users_infos WHERE email='$log_email' AND password='$log_password'";
    $res = mysqli_query($connexion, $sql_login);
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $id = "SELECT * FROM users_infos WHERE email='$log_email' AND password='$log_password' ";
        $res_id = mysqli_query($connexion, $id);
        $row=mysqli_fetch_array($res_id, MYSQLI_ASSOC);
        $_SESSION["usrnm"] = $log_email;
        $_SESSION["psswrd"] = $log_password;
        $_SESSION["id"]=$row['accountId'];
        $_SESSION["nommek"]=$row['pseudo'];
        $_SESSION["cryptedweb"] = base64_encode($_SESSION["id"]);
        header('Location: ../home.php?ref='.$_SESSION["cryptedweb"].'');
        exit();
    }
    else{
        header("Location: ../my_chata.php");
        exit();
    }
}
?>