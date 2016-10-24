<?php
    include_once("../php/logincheck.php");
    include_once("../php/signup.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ClickToFix</title>

        <script src="../js/ajax.js"></script>
        <script src="../js/misc.js"></script> 
        <script src="../js/signup.js"></script>
    </head>
<body>

    <form name="signupform" id="signupform" onsubmit="return false;">
        <div>Z-Number (Ex: 12345678): </div>
        <input id="znumber" type="text" onkeyup="restrict('znumber')" maxlength="8">
        <div>First Name: </div>
        <input id="firstname" type="text" maxlength="100">
        <div>Last Name: </div>
        <input id="lastname" type="text" maxlength="100">
        <div>Username: </div>
        <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="100">
        <span id="usernamestatus"></span>
        <div>Email Address:</div>
        <input id="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="100" style="display: inline-block">@fau.edu<br>
        <div>Password:</div>
        <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="100">
        <div>Confirm Password:</div>
        <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="100">
        <br><br>
        <button id="signupbtn" onclick="signup()">Create Account</button>
        <span id="status"></span>
    </form>
    
</body>
</html>