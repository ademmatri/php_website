<?php
session_start();
error_reporting(0);
require "connexionSQL.php";
$new_psswrd=mysqli_real_escape_string($connexion, $_POST["checking"]);
$changed = "UPDATE users_infos SET password='".$new_psswrd."' WHERE email='".$_SESSION['oldemail']."' ";
$resultat = mysqli_query($connexion, $changed);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
    <title>Password reset successfully | MyChata</title>
    <link rel="stylesheet" type="text/css" href="success.css">
</head>
<body>
    <div id="missionCompleted">
        <h3>Your password has been changed successfully.</h3>
        <div class="success-animation">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
        </div>
        <h4>Now you can login with your new password, <a href="my_chata.php" id="a1">Go to login page.</a></h4>
        
    </div>
    <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

</body>
</html>