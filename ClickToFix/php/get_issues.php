<?php
    include_once("db_connect.php");  //connect to database

    $sql = "SELECT * FROM issues WHERE id = 2"; 
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $issueName = $data["message"];
?>