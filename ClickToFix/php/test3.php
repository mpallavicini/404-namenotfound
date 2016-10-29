<?php
include_once("../php/db_connect.php"); 

echo "gjg";
//file properties


$my_folder = "../data/";
copy($_FILES['image']['tmp_name'], $my_folder.$_FILES['image']['name']);
echo "file uplaoded";

$file = mysqli_real_escape_string($_FILES['image']['tmp_name']); 

//image= image name, tmp_name = temporary location in web directory
 
if(!isset($file)){   // if the file has not been selected
echo "Please select an image";} 

else
{
$image  = file_get_contents($_FILES['image']['tmp_name']);   // same as $file (setup image name and image size to figure if its image or not)
//image is same as the name we have in the form to upload the photo
//File_get_contents function to get the data inside the file
 
$imageName =  $_FILES['image']['name'];   //return actual file name as uploaded
$imageSize = getimagesize(= $_FILES['image']['tmp_name']);   //getting image size from the temp. location
//getimagesize will return false if it is not an image file,
if ($imagSize = = FALSE)
echo "It is not an image";
else
{
$insertImage = "INSERT INTO image (issue_id, image_name, image) VALUES ('','$imageName','{$image}')");
    if(mysqli_query($db,$insertImage))
        echo "New Record Created";
else
{

    
    //Need to do retrieval part here
}
}
}


?>
