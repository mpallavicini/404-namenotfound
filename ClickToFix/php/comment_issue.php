<?php
    if(isset($_POST["msg"])) {
        session_start();
        include_once("db_connect.php");
        
        $issue_id = $_POST['i'];
        $msg = $_POST["msg"];
        
        $sql = "SELECT firstname, lastname FROM users WHERE user_no=".$_SESSION['userid'];
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        $name = $data['firstname'] . ' ' . $data['lastname'];
        
        $sql = "INSERT INTO comments(issue_id, comment, owner) VALUES($issue_id, '$msg', '$name')";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        $id = mysqli_insert_id($db);
        
        $sql = "SELECT owner, comment, datetime, votes FROM comments WHERE id=$id";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
 
        echo json_encode(array('success', $data['owner'], $data['comment'], $data['datetime'], $data['votes']));
        exit();
    }
?>