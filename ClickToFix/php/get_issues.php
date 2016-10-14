<?php
    include_once("db_connect.php");

    $sql = "SELECT name FROM issues";
    $query = mysqli_query($db, $sql);

    if ($query === true) {
        echo "Success fetching from issues.";
    } else {
        echo "Failure fetching from issues.";
    }

    $data = mysqli_fetch_assoc($query);
        
    if (count($data) == 0) {
        echo "No table row found.";
        exit();
    }

    $issueName = $data["id"];
?>