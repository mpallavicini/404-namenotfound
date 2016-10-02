<?php
    $db = mysqli_connect("localhost", "bkelm", "9Ph18aSpZA", "bkelm");
                        //address     username    password      database name

    if (mysqli_connect_error()) { //check for connection error
        echo mysqli_connect_error();
        exit();
    }
?>