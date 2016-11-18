<?php
    $user_id = $_SESSION['userid'];
        
    if (!$user_id) {
        echo "You are not logged in.";
        exit();
    }

    $sql = "SELECT user_permission FROM users WHERE user_no=$user_id AND activated=1 LIMIT 1";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);
    $user_permission = $data["user_permission"];

    if ($user_permission != 1) {
        echo "Permission denied!";
        exit();
    }
?>