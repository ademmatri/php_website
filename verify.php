<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="siteLogo1.png" sizes="120×120"/>
		<link rel="stylesheet" type="text/css" href="also_stupid.css" />
		<script src="verify.js" defer></script>
        <title>Account confirmation | MyChata</title>
    </head>
    <body>
        <div class="allverif">
            <div class="otc" name="one-time-code">
                <fieldset>
                    <legend>Confirmation Code :</legend>
                    <div class="attention_box">
                        <p id="importantmessage"><img class="im" src="ffs.png" width="21" >Confirmation code has been sent to your email</p>
                    </div>
                    <label for="otc-1">Number 1</label>
                    <label for="otc-2">Number 2</label>
                    <label for="otc-3">Number 3</label>
                    <label for="otc-4">Number 4</label>
                    <label for="otc-5">Number 5</label>
                    <label for="otc-6">Number 6</label>
            
                    <!-- https://developer.apple.com/documentation/security/password_autofill/enabling_password_autofill_on_an_html_input_element -->
                    <div>
                    <input type="number" pattern="[0-9]*" inputmode="numeric" autocomplete="off" id="otc-1" required>
            
                    <!-- Autocomplete not to put on other input -->
                    <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" class="c2" inputmode="numeric" id="otc-2" autocomplete="off" required>
                    <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" class="c3" inputmode="numeric" id="otc-3" autocomplete="off" required>
                    <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" class="c4" inputmode="numeric" id="otc-4" autocomplete="off" required>
                    <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" class="c5" inputmode="numeric" id="otc-5" autocomplete="off" required>
                    <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" class="c6" inputmode="numeric" id="otc-6" autocomplete="off" required>
                    </div>
                </fieldset>
            </div>  
            <button class="wait_verif" onclick="checking()"><span>Verify</span></button>
            <div>
                <span class="check" hidden>Checking...</span>
                <span class="ic" hidden>Incorrect Code!</span>
                <span class="emptyInp" hidden>Empty box!</span>
                <span class="correct" hidden>Correct, now you can login</span>
            </div>
            
        </div>
    </body>   
</html>