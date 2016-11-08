<?php
    if (isset($_POST["i1"]) && isset($_POST["i2"])) {
        session_start();
        include_once("db_connect.php");
        include_once("check_permission.php");
        
        $issueId1 = $_POST["i1"];
        $issueId2 = $_POST["i2"];
        
        if ($issueId1 != "" && $issueId2 != "") {
            $sql = "UPDATE images SET issue_id=$issueId1 WHERE issue_id=$issueId2";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "UPDATE comments SET issue_id=$issueId1 WHERE issue_id=$issueId2";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM issues WHERE id=$issueId2";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            echo "success";
            exit();
        } else {
            echo "No issues selected!";
            exit();
        }
    }
?>

