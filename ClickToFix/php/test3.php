<?php
include_once("../php/db_connect.php"); 

echo "gjg";
//file properties


$my_folder = "../data/";
copy($_FILES['image']['tmp_name'], $my_folder.$_FILES['image']['name']);
echo "file uplaoded";

/*$file = mysqli_real_escape_string($_FILES['image']['tmp_name']); 

//image= image name, tmp_name = temporary location in web directory
 
if(!isset($file)){   // if the file has not been selected
echo "Please select an image";} 

else
{
$image  = file_get_contents($_FILES['image']['tmp_name']);   // same as $file (setup image name and image size to figure if its image or not)
//image is same as the name we have in the form to upload the photo
//File_get_contents function to get the data inside the file
 
$image_name =  $_FILES['image']['name'];   //return actual file name as uploaded
$image_size = getimagesize(= $_FILES['image']['tmp_name']);   //getting image size from the temp. location
//getimagesize will return false if it is not an image file,
if ($image_size = = FALSE)
echo "It is not an image";
else
{
if(!$insert = mysql_query("INSERT INTO image VALUES ('','','$image_name','$image')"))
echo "Problem uploading image.";
else
{

    
    //Need to do retrieval part here
}
}
}
*/

?>