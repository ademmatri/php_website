<?php
session_start();
require "../connexionSQL.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../vendor/autoload.php";

$pseudo=mysqli_real_escape_string($connexion, $_POST["pseudo"]);
$surname=mysqli_real_escape_string($connexion, $_POST["surname"]);
$name = $pseudo.  " "  .$surname;
$dateofbirth=mysqli_real_escape_string($connexion, $_POST["dateentered"]);
$password=mysqli_real_escape_string($connexion,$_POST["password"]);
$email=mysqli_real_escape_string($connexion,$_POST["email"]);
$location = $_POST["location"];
$otp=  $_POST["otp_calcul"];
$_SESSION["id"]=$otp;

if (isset($pseudo) && isset($password) && isset($email) && isset($location) && isset($surname)) {

    $sql_signup = "SELECT * FROM users_infos WHERE email='$email' ";
    $result = mysqli_query($connexion, $sql_signup);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
        $req = mysqli_query($connexion, "INSERT INTO users_infos(pseudo,birthday,email,password,location,accountId) VALUES ('$name','$dateofbirth' ,'$email','$password','$location','#$otp')");
        $req2=mysqli_query($connexion, "INSERT INTO online_friends(pseudo,accountId,friends) VALUES ('$name','#$otp','')");
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
            $mail->addAddress($email); //Add a recipient//Name is optional
            $mail->addReplyTo($email);
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'The verification code from < Mychata >';
            $mail->Body = 'Mychata Your OTP is ' . $otp .'.Valid for just 5 minutes. If you did not make this request, please ignore this email.';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            header("Location: ../verify.php");
            exit();
  
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }  
    }
    
}
?>