<?php
    session_start();
    $_SESSION = array();
    
    if (isset($_COOKIE["id"]) && isset($_COOKIE["email"]) && isset($_COOKIE["pass"])) {
        unset($_COOKIE["id"]);
        unset($_COOKIE["email"]);
        unset($_COOKIE["pass"]);
        setcookie("id", null, -1, '/');
        setcookie("email", null, -1, '/');
        setcookie("pass", null, -1, '/');
    }

    session_destroy();
    
    if (isset($_SESSION['useremail'])) {
        header("location: ../pages/Message.php?msg=Error:_Logout_Failed");
    } else {
        header("location: ../pages/Login.php");
        exit();
    }
?>