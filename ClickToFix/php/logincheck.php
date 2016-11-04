<?php
    if (!isset($_SESSION['useremail'])) {
        header("location: login.php");
        exit();
    }
?>