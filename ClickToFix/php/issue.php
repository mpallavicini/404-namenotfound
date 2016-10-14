<?php 
    include_once("db_connect.php");
    
    //Checking to see if the Post is sent
    if(isset($_POST['issueName']))
    { 
        $msg = $_POST['message']; 
        
        $name = $_POST['issueName']; 
        $loc = 'SU80';
        
        $sqli = "INSERT INTO issues(message, name, location) VALUES('$msg', '$name', '$location')";
    
        $query = mysqli_query($db, $sqli);

        if ($query === true) {
            echo "Success";
        } else {
            echo "Fail";
        }
    } 
?>