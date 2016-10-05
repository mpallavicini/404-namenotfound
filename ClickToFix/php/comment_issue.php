<?php
    include_once("db_connect.php");

    if(isset($_POST["issue_id"])) {
        $issue_id = $_POST["issue_id"];
        $commemt = $_POST["comment"];
        
        $sql = "INSERT INTO comments(comment) VALUES('$comment')";
        $query = mysqli_connect($db, $sql);
        
        if ($querty === true) {
            echo "Success inserting into comments table."
        } else {
            echo "Failure to insert into comments table.";
        }
        
        $sql = "SELECT MAX(id) FROM comments";
        $query = mysqli_connect($db, $sql);
        $data = mysqli_fetch_array($query);
        
        if (count($data) != 0) {
            echo "ID '$data[0]' was last one added.";
        } else {
            echo "Failure to get ID back.";
        }
        
        $sql = "INSERT INTO issues_comments(issue_id, comment_id) VALUES('$issue_id', '$$data[0]')";
        $query = mysqli_connect($db, $sql);
        
        if ($querty === true) {
            echo "Success inserting into issues_comments table."
        } else {
            echo "Failure to insert into issues_comments table.";
        }
    }
?>