<?php 
    include_once("../php/db_connect.php");
    

    $file = $_FILES['fileInput']['tmp_name'];

    if (!isset($file)) {
        echo "Please select an image";
    }
    else {
        $image = file_get_contents($_FILES['fileInput']['tmp_name']);
        $imageName = $_FILES['fileInput']['name'];
        $imageSize = getimagesize($_FILES['fileInput']['tmp_name']);

        if ($imageSize == FALSE) {
            echo "It is not an image";
        } else {
            $image = mysqli_real_escape_string($db, $image);
            $insertImage = "INSERT INTO images (name, image) VALUES ('{$imageName}','{$image}')";
            mysqli_query($db,$insertImage) or die(mysqli_error($db));
        }
    }

    //Checking to see if the Post is sent
    if(empty($_POST['issueName'] && $_POST['message'])== false)  //Make sure that issueName and message is filled out in ClicktoFix
    { 
        $msg =  $_POST['message']; //passing variable 'msg' the value from 'message' form entered by user
        $_msg = addslashes($msg);
        
        
        $name = $_POST['issueName']; //passing variable 'name' the value from the 'issueName' form entered by user
        $_name = addslashes($name);
        $loc = 'SU80';
        
        $sql = "INSERT INTO issues (message, name, location) VALUES('$_msg', '$name', '$loc')";
     
        //"INSERT INTO issues (rowsInTable1, rowsInTable2, rowsInTable3) VALUES('$variable1', '$variable2', '$variable3')"
        $query = mysqli_query($db, $sql);

        if ($query === true) {
            echo "Success";
        } else {
            echo "Fail";
        }
         
        header("Location: ../index.html");
         
    } else{
        // This is in the PHP file and sends a Javascript alert to the client
        


        $message = "wrong answer";
        echo '<script type="text/javascript">alert("Please enter the issue name and description");</script>';
        
        header("Location: ../index.html");
    }
   
   
//exit();
?>
