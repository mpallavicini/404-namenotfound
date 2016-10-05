<?php
    include_once("db_connect.php");

    $issue_table = "CREATE TABLE IF NOT EXISTS issues (
                    id INT(10) NOT NULL AUTO_INCREMENT,
                    issueName VARCHAR(255) NOT NULL, 
                    message VARCHAR(255) NOT NULL,
                    PRIMARY KEY(id) 
                    )";
    $query = mysqli_query($db, $issue_table);

    if ($query === true) {
        echo "SuccessTable";
    } else {
        echo "FailTable";
    }

    exit();
?>