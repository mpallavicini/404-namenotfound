<?php
    include_once("../php/db_connect.php");  //connect to database

    $sql = "SELECT name FROM issues WHERE id = 2"; 
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $issueName = $data["name"];
?>