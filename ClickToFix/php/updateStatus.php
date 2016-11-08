<?php
    if (isset($_POST["s"])) {
        session_start();
        include_once("db_connect.php");
        
        $issue_status = $_POST["s"];
        $issue_id = $_POST["i"];
        
        if (!$issue_status || !$issue_id) {
            echo "No issue or no status selected.";
            exit();
        }
        
        include_once("check_permission.php");
        
        $sql = "UPDATE issues SET status='$issue_status' WHERE id='$issue_id'";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        echo "success";
        exit();
    }
?>