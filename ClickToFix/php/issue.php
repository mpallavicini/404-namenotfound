<?php 
    include_once("db_connect.php");
    
    //Checking to see if the Post is sent
    if(isset($_POST['issueName']))
    { 
        $msg = $_POST['message']; 
        
        $issues = $_POST['issueName']; 
        
        $sqli = "INSERT INTO issues(message, issueName) VALUES('$msg', '$issues')";
    
        $query = mysqli_query($db, $sqli);

        if ($query === true) {
            echo "Success";
        } else {
            echo "Fail";
        }
        
         header("Location: ../index.html");
    } 

 

 
?>