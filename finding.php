<?php
session_start();
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";
require "connexionSQL.php";
$verifcode=mysqli_real_escape_string($connexion, $_POST["codo1"]);
$input_text =mysqli_real_escape_string($connexion, $_POST["input_text"]);
$changing = "SELECT password FROM users_infos WHERE email='$input_text' OR accountId='$input_text'";
$res = mysqli_query($connexion, $changing);
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$count = mysqli_num_rows($res);
if($count > 0){
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    try {
        //Server settings
        $mail->SMTPDebug = false; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'mychata.team@gmail.com'; //SMTP username
        $mail->Password = 'jywpkiwiyctyxysz'; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` //Recipients
        $mail->setFrom('mychata.team@gmail.com', 'Mychata');
        $mail->addAddress($input_text); //Add a recipient//Name is optional
        $mail->addReplyTo($input_text);
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'The verification code from < Mychata >';
        $mail->Body = 'Your code is '.$verifcode.'.Valid for just 5 minutes. If you did not make this request, please ignore this email.';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $_SESSION['oldemail'] = $input_text;
}
else{
    $_SESSION["notfound"] = "Account not found!";
    header("Location: find_pswrd.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
    <title>Changing password | MyChata</title>
    <link rel="stylesheet" type="text/css" href="finding2.css" />
    
    <script src="finding.js" defer></script>
</head>
<body>
    <div class="cc">
        <div id="already" >
            <table id="tb">
                <tr><td><h3>Put your code that has been sent to your email:</h3></td></tr>
                <tr><td><input id="codeverif" type="number" inputmode="numeric" placeholder="Your code" required></td></tr>
                <tr><td><p class="nc" hidden>Code not correct!</p></td></tr>
                <tr><td><hr class="har1"></td></tr>
                <tr><td>
                   <button id="back">Cancel</button> 
                   <button id="move">Continue</button>
                </td></tr>
                <input id="df0" name="df0" type="text" hidden>
            </table>
        </div>
        <form id="changeform" method="post" action="success.php">
            <table id="tb2">
                <tr><td><h3>Put your new password:</h3></td></tr>
                <tr><td><input class="checking" name="checking" type="password" placeholder="New password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}"></td></tr>
                <tr><td><input class="confirming" type="password" placeholder="Repeat the new password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}"></td></tr>
                <tr><td><p class="sdq1" hidden>Repeat the password correctly!</p></td></tr>
                <tr><td><hr></td></tr>
                <tr><td><button class="batn1" type="button" onclick="TakeMeToHomePage()">Cancel</button>
                <button class="batn2" type="submit" disabled>Continue</button>
            </td></tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php 
echo '<script>document.querySelector("#df0").setAttribute("value","'.$verifcode.'");</script>';
?>