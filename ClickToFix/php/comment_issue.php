<?php
    include_once("db_connect.php");

    if(isset($_POST["msg"])) {
        
        $msg = $_POST["msg"];

        
        $sql = "INSERT INTO comments(comment) VALUES('$msg')";
        $query = mysqli_query($db, $sql);
 
        echo $msg;
        exit();
    }
?>