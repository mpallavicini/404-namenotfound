<?php
    include_once("../php/db_connect.php");  //connect to database
    
    $sql = "SELECT message FROM issues ORDER BY id DESC"; 
    $query = mysqli_query($db, $sql);

    while ($fetch = mysqli_fetch_assoc($query)){
        $msg = nl2br($fetch['message']);
        
        echo ("<p>$msg</p>");
    }

    

?>