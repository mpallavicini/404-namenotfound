<?php
    if (isset($_SESSION['username'])) {
        header("location: pages/ClitkToFix.php");
        exit();
    }
?>