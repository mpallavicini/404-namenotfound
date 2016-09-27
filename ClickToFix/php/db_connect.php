<?php
    $db = mysqli_connect("localhost", "username", "password", "table name");
                        //address     username    password      table name

    if (mysqli_connect_error()) { //check for connection error
        echo mysqli_connect_error();
        exit();
    }
?>