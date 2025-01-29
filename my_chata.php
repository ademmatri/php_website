<?php
session_start();
error_reporting(0);
if (isset($_SESSION["usrnm"]) && isset($_SESSION["psswrd"])) {
    header('Location: home.php?ref='.$_SESSION["cryptedweb"].'');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inscription ou connexion | wie</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
        <link rel="stylesheet" type="text/css" href="stupid.css" />
        <script src="my_chata.js" defer ></script>  
    </head>
    <body>
        <main>
            <div class="div1">
                <form class="form2" method="post" action="phpfiles/login.php" onsubmit="setCookie()">
                    <h2 class="titre2">Login</h2>
                    <div>
                        <label for="email_login">E-mail </label><br>
                        <input id="email_login" class="email_login" name="log_email" autocomplete="on" type="email" required >
                    </div>
                    <div>
                        <label for="pass_input_login">Password</label><br>
                        <input id="pass_input_login" class="pass_input_login" autocomplete="off" name="log_password" type="password" required>
                        
                    </div>
                    <div id="forget-pass-a">
                        <a href="find_pswrd.php" class="forget_pass" >Forgot Password?</a>
                    </div>
                    <div style="width: 70%;">
                        <button class="b2"  type="submit" name="send_log" ><span>Login</span></button>
                    </div>
                    <hr class="log_hr">
                </form>
                    <button class="b4">Sign up</button>
            </div>
            <div class="div2">
                <div class="div_of_box">
                    <i class="back_icon" hidden>&#8592;</i>
                    <img class="infoSignup" src="info.png" onmouseover="showSignInfo()" onmouseleave="hideSignInfo()" >
                    <span class="infoSignupMsg" hidden>You should sign up with your Gmail. A verification code will be sent to your Gmail.</span>
                    <form class="form" name="form" autocomplete="off"  method="post" action="phpfiles/signup.php" >
                        <h2 class="titre3">Sign up</h2>
                        <div>
                            <label for="userName">Username <span class="etoile-important">*</span></label><br>
                            <input id="userName" class="in1" name="pseudo" type="text" required>
                        </div>
                        <div>
                            <label for="idn1">Surname <span class="etoile-important">*</span></label><br>
                            <input id="idn1" class="idn1" name="surname" type="text" required>
                        </div>
                        <div>
                            <label for="email_input">E-mail <span class="etoile-important">*</span></label><br>
                            <input id="email_input" class="email_input" name="email" type="email" required>
                        </div>
                        <div>
                            <label for="pass_input">Password <span class="etoile-important">*</span></label><br>
                            <input id="pass_input" class="pass_input" name="password" type="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}" >
                        </div>
                        <div>
                            <label for="pass_input_confirm">Repeat password <span class="etoile-important">*</span></label><br>
                            <input id="pass_input_confirm" class="pass_input_confirm" name="confirm_password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
                        </div>
                        <div id="dateofbirth">
                            <input type="date" placeholder="Day of birth" class="dateentered" name="dateentered" max="2020-01-01" min="1920-01-01" title="Birthday" required>
                        </div>
                        <div>
                            <input class="term" type="checkbox" required><span class="term_of_use">I agree <a id="cnd" href="termOfUse.html">Conditions</a> of Use</span>
                        </div>
                        <button class="b1" type="submit" onclick="saveInSession()" name="send" ><span>Sign up</span></button>
                        <input type="text" name="ipo" class="ip1" hidden >
                        <input type="text" name="location" class="location" hidden>
                        <input class="otp_calcul" id="ww" name="otp_calcul" type="number" inputmode="numeric" hidden>
                    </form>
                </div>
            </div> 
            
        </main>
        <div id="gradient-div">
                
        </div>
        <footer>
                <div id="first-footer-param">
                    <ul>
                        <li><p class="small-paragraph">Company</p></li>
                        <li><a href="" target="_blank">About us</a></li>
                        <li><a href="" target="_blank">Contact us</a></li>
                        <li><a href="" target="_blank">Terms and Privacy</a></li>
                        <li><a href="" target="_blank">Help</a></li>
                        <li><a href="" target="_blank">Feedback</a></li>
                    </ul>
                </div>
                <div id="second-footer-param">
                    
                    <ul>
                        <li><p class="small-paragraph">Multilingual support</p></li>
                        <li><a href="" dir="ltr">Français</a></li>
                        <li><a href="" dir="rtl">العربية</a></li>
                        <li><a href="" dir="ltr">English</a></li>
                        <li><a href="" dir="ltr" >Deutsch</a></li>
                        <li><a href="" dir="ltr">Español</a></li>
                    </ul>
                </div>
                <div>
                    <button id="button_footer" onclick="topscroll()">Sign up</button>
                </div>
                <div id="third-footer-param">
                    <ul>
                        <li><p class="small-paragraph">Social media</p></li>
                        <li><a href="" target="_blank"><img src="instagramlogolink.svg" loading="lazy" width="25" height="25" alt=""> Instagram</a></li>
                        <li><a href="" target="_blank"><img src="facebooklogo.svg" loading="lazy" width="25" height="25" alt=""> Facebook</a></li>
                        <li><a href="" target="_blank" ><img src="twitterlink.png" width="23" height="23" alt=""> X</a></li>
                    </ul>
                </div>
                <div></div>
                <div></div>
        </footer>
        <script>
            async function fetchText(){
                let curl ="https://ipinfo.io/json?token=4ad649fff8a7fb";
                let response = await fetch(curl);
                let data = await response.json();
                timezone =data.timezone;
                city=data.city;
                region=data.region;
                ip=data.ip;
                document.querySelector(".ip1").value = ip;
                document.querySelector(".location").value = timezone + "=>"+ region+"=>"+city;
            }
            fetchText();
        </script>
    </body>
</html>