<?php
    session_start();

    if (isset($_POST["s"])) {
        include_once("db_connect.php");
        
        $issue_status = $_POST["s"];
        $issue_id = $_POST["i"];
        
        if (!$issue_status || !$issue_id) {
            echo "No issue or no status selected.";
            exit();
        }
        
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
            echo "No permission to change this.";
            exit();
        }
        
        $sql = "UPDATE issues SET status='$issue_status' WHERE id='$issue_id'";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        echo "success";
        exit();
    }
?>