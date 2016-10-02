<?php 
    include_once("db_connect.php");

    $msg = $_POST["message"];
    
    $sql = "INSERT INTO issues(message) VALUES('$msg')";
    $query = mysqli_query($db, $sql);

    if ($query === true) {
        echo "Success";
    } else {
        echo "Fail";
    }

 
?>