<?php 
    include_once("../php/db_connect.php");



include_once("../php/db_connect.php");

$username = $_SESSION['useremail'];
$anonymous = 0;
if(isset($_POST['anonymous']) && $_POST['anonymous'] == 'Yes') 
    {
    $anonymous = 1;
    }
echo $anonymous;


  
if(isset($_POST['issueName'])){
    //Checking to see if the Post is sent
    if(empty($_POST['issueName'] && $_POST['message'] && $_POST['loc']) == false)  //Make sure that issueName and message is filled out in ClicktoFix
    { 
        $msg =  $_POST['message']; //passing variable 'msg' the value from 'message' form entered by user
        $_msg = addslashes($msg);
        
        
        $name = $_POST['issueName']; //passing variable 'name' the value from the 'issueName' form entered by user
        $_name = addslashes($name);
        $loc = $_POST['loc'];
        
        //Picture part HERE  
          $file = $_FILES['fileInput']['tmp_name'];
    } else {
        echo "<script type='text/javascript'>alert('Please enter the issue name and description');</script>";
        
    }

    if (!$file) {
        echo "<script type='text/javascript'>alert('Please select an image');</script>";

    }
    else {
        $image = file_get_contents($file);
        $imageName = $_FILES['fileInput']['name'];
        $imageSize = getimagesize($file);

        if ($imageSize == FALSE) {
            echo "<script type='text/javascript'>alert('Select an Image');</script>";

        } else {
            $image = mysqli_real_escape_string($db, $image);
            
            //$sql = "INSERT INTO issues (message, name, location, image) VALUES('$_msg', '$name', '$loc', '{$image}')";
            $sql = "INSERT INTO issues (message, name, location, image, user, anonymity) VALUES('$_msg', '$name', '$loc', '{$image}','$username','$anonymous')";

        
        //"INSERT INTO issues (rowsInTable1, rowsInTable2, rowsInTable3) VALUES('$variable1', '$variable2', '$variable3')"
    
            $query = mysqli_query($db, $sql);
    

        
    }
        
         
    }

    
    
//header("Location: ../index.html");
}
   
?>
