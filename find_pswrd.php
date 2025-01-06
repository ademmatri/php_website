<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
    <title>Changing password | MyChata</title>
    <link rel="stylesheet" type="text/css" href="find_pswrd.css" />
</head>
<body>
    <div class="box">
        <form action="finding.php" method="post">
            <table class="tab">
                <tr><td><h2>Find your account</h2></td></tr>
                <tr><td><hr class="hr1"></td></tr>
                <tr><td><p class="text">Enter your email address with which you created your account to search for it.</p></td></tr>
                <tr><td><input class="input_text" name="input_text" type="email" placeholder="ID or email you signed up with" required></td></tr>
                <tr><td><p id="nobb" hidden><?php echo $_SESSION["notfound"]; ?></p></td></tr>
                <tr><td><hr class="hr2"></td></tr>
                <tr>
                    <td><button class="btn_cancel" type="button" onclick="TakeMeToHomePage2()">Cancel</button>
                        <button class="btn_search" type="submit">Search</button></td>
                </tr>
            </table>
            <input id="codo1" name="codo1" type="text" hidden>
        </form>
    </div>
    <script>
        function between(min, max) {  
            return Math.floor(
              Math.random() * (max - min) + min
            )
        }
        let codeverif = between(10000, 99999);
        document.querySelector('#codo1').setAttribute('value',codeverif);
        function TakeMeToHomePage2() {
            window.location.replace("my_chata.php");
        }
    </script>
</body>
</html>
<?php
if (isset($_SESSION["notfound"])) {
    echo '<script>document.querySelector("#nobb").hidden=false;</script>';    
}
?>