<?php
    if (!isset($_SESSION['useremail'])) {
        header("location: Login.php");
        exit();
    }
?>