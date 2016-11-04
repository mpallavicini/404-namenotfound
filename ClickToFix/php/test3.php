<?php
require("../php/db_connect.php"); 

echo $_FILES['file']['error'];
//file properties

$my_folder = "../data/";
copy($_FILES['file']['tmp_name'], $my_folder.$_FILES['file']['name']);
echo "file uploaded";

$file = mysqli_real_escape_string($db, $_FILES['file']['tmp_name']);

if (!isset($file)) {
    echo "Please select an image";
} else {
    $image = file_get_contents($_FILES['file']['tmp_name']);
    $image_name = $_FILES['file']['tmp_name'];
    $imageType = $_FILES['file']['type'];
    
    if(substr($imageType, 0 , 5) == 'image')
    {echo "workingish";
     //$sqlimg = "INSERT INTO images ('image_id', 'issue_id', 'name', 'image') VALUES ('1','2','$image_name','$image')";
     
       $img = mysqli_query($db, "INSERT INTO images (image_id, issue_id, name, image) VALUES ('','','$image_name','$image')");
     echo $img;
    //mysqli_query($db, $sqlimg );
    }
    else{
        echo "NOPE";
    }
}
   /* $image_size = getimagesize( $_FILES['file']['tmp_name']);
    if($image_size == FALSE)
    {
        echo "It is not an image";
        exit();
    }else
    {
        
        $sqlimg = "INSERT INTO images ('image_id', 'issue_id', 'name', 'image') VALUES ('1','2','$image_name','$image')";
        $insert = mysqli_query($db, $sqlimg );
        
            
        
            //else
           // {
                //Need to do retrievel part
          //  }
        
    }
    
}

*/

/*
//image= image name, tmp_name = temporary location in web directory
 
if(!isset($file)) {   // if the file has not been selected
    echo "Please select an image";
} 

else
{
$image  = file_get_contents($_FILES['file']['tmp_name']);   // same as $file (setup image name and image size to figure if its image or not)
//image is same as the name we have in the form to upload the photo
//File_get_contents function to get the data inside the file
 
$image_name =  $_FILES['file']['name'];   //return actual file name as uploaded
$image_size = getimagesize(= $_FILES['file']['tmp_name']);   //getting image size from the temp. location
//getimagesize will return false if it is not an image file,
if ($image_size = = FALSE)
echo "It is not an image";
else
{
if(!$insert = mysqli_query("INSERT INTO image VALUES ('','','$image_name','$image')"))
echo "Problem uploading image.";
else
{

    
    //Need to do retrieval part here
}
}
}*/


?>