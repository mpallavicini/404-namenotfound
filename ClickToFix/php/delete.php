<?php
    if (isset($_POST["i"])) {
        session_start();
        include_once("db_connect.php");
        include_once("check_permission.php");
        
        $issueId = $_POST["i"];
        
        if ($issueId != "") {
            $sql = "DELETE FROM images WHERE issue_id=$issueId";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM comments WHERE issue_id=$issueId";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM issues WHERE id=$issueId";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            echo "success";
            exit();
        } else {
            echo "No issue selected!";
            exit();
        }
    }
?>