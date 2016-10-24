<?php
    include_once("../php/logincheck.php");
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
        <script src="../js/login.js"></script>
    </head>
<body>

    <form id="loginform" onsubmit="return false;">
        <div>Username:</div>
        <input type="text" id="username" onfocus="emptyElement('status')" maxlength="100">
        <div>Password:</div>
        <input type="password" id="password" onfocus="emptyElement('status')" maxlength="100">
        <br>
        <button id="loginbtn" onclick="login()">Log In</button>
        <br>
        <p id="status"></p>
        <br>
        <a href="#">Forgot Your Password?</a>
    </form>
    
</body>
</html>