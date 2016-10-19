<?php
    include_once("db_connect.php");

    if(isset($_POST["issue_id"])) {
        $issue_id = $_POST["issue_id"];
        $commemt = $_POST["comment"];
        $owner = $_POST["user"];
        $loc = $_POST["loc"];
        
        $sql = "INSERT INTO comments(comment, comment_owner, building_location)             VALUES('$comment', '$owner', '$loc'";
        $query = mysqli_connect($db, $sql);
        
        if ($querty === true) {
            echo "Success inserting into comments table."
        } else {
            echo "Failure to insert into comments table.";
        }
        
        exit();
    }
?>