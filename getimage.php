<?php
include_once("db_connect.php");
function showImage($id)
{
	
	// Check connection
	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

	//echo "Test";
	
	//$id = $_REQUEST['id'];
	
	$displayQry = "SELECT image FROM mydb.image WhERE image_id = $id"; 	
	
	$displayQry = mysqli_query($db, $displayQry);
	
	
	while($row = mysqli_fetch_assoc($displayQry))
	{
	
		$imageData = $row['image'];
		$imageData = base64_encode($imageData);
		echo '<img src="data:image/jpeg;base64,'.$imageData.'" height = "928" width="1024"/>';
	
	}
	
	mysqli_close($db); 
}
?>
