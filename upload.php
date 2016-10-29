<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//file properties
$file = $_FILES["fileToUpload"]["tmp_name"];
echo $file;
if(!isset($file))
{echo "Please select an image";}

else
{
$image  = file_get_contents($_FILES['fileToUpload']['tmp_name']);   // same as $file (setup image name and image size to figure if its image or not)
//image is same as the name we have in the form to upload the photo
//File_get_contents function to get the data inside the file


$imageName =  $_FILES['fileToUpload']['name'];   
$imageSize = getimagesize($_FILES['fileToUpload']['tmp_name']);   

//getimagesize will return false if it is not an image file
if ($imageSize == FALSE)
{echo "It is not an image";}
else
{
//echo $image_name;
//echo $image;
//$insertImage = "INSERT INTO mydb.myguests (firstname, lastname, email) VALUES ('Ram', 'sharma', 'ram@example.com')";

$insertImage = "insert into mydb.image (image_name, image) VALUES ('$imageName','')";
//$insertImage = "insert into mydb.image (image_name, image) VALUES ('$imageName','$image')"; 

//echo $insertImage;
 

if (mysqli_query($conn, $insertImage)) {
    echo "New record created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
}}
mysqli_close($conn);
?>