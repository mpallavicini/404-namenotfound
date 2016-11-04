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


?>
