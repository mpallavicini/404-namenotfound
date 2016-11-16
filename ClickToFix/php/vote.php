<?php
    session_start();

    if (isset($_SESSION['userid']) && isset($_POST["v"])) { //Check for POSTS calls to this page 
        include_once("db_connect.php");  //connect to database
        
        $userId = $_SESSION['userid'];
        $v = $_POST["v"];      
        $id = $_POST["i"];
        
        $sql = "SELECT liked FROM users_likes WHERE issue_id=$id AND user_id=$userId";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        
        $related = false;
        if (mysqli_num_rows($query) > 0) {
            $related = true;
        }
        
        $sql = "";
        if ($v == 1) {
            if ($data['liked'] != 1) {
                $sql = "UPDATE issues SET likes = likes + 1 WHERE id = $id";  //Update likes on database
                $liked = 1;
            } else {
                $sql = "UPDATE issues SET likes = likes - 1 WHERE id = $id";
                $liked = 0;
            }
        } else if ($v == 0) {
            if ($data['liked'] != -1) {
                $sql = "UPDATE issues SET likes = likes - 1 WHERE id = $id";
                $liked = -1;
            } else {
                $sql = "UPDATE issues SET likes = likes + 1 WHERE id = $id";
                $liked = 0;
            }
        } else {
            echo "fail";
            exit();
        }
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        if ($related) {
            $sql = "UPDATE users_likes SET liked=$liked WHERE user_id=$userId AND issue_id=$id";
        } else {
            $sql = "INSERT INTO users_likes(user_id, issue_id, liked) VALUES($userId, $id, $liked)";
        }
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        $sql = "SELECT likes FROM issues WHERE id=$id LIMIT 1";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        
        if (count($data) == 0) {
            echo "Issue not found!";
            exit();
        }
        
        echo 'success', '<br>', $data["likes"];  //echo back to vote.js ajax return function
        exit();
    }
?>