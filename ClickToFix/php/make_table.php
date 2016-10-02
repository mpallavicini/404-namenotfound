<?php
    include_once("db_connect.php");

    $issue_table = "CREATE TABLE IF NOT EXISTS issues (
                    id INT(10) AUTO_INCREMENT,
                    message CHAR(255),
                    PRIMARY KEY(id)
                    );";
    $query = mysqli_query($db, $issue_table);

    if ($query === true) {
        echo "Success";
    } else {
        echo "Fail";
    }
?>