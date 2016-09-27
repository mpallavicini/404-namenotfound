<?php
    include_once("db_connect.php");  //connect to database

    $sql = "SELECT likes FROM posts WHERE id = 1 LIMIT 1";  //Get amount of likes from database
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $likes = $data["likes"];
?>
<?php
    if (isset($_POST["v"])) { //Check for POSTS calls to this page 
        
        include_once("db_connect.php");  //connect to database
        $v = $_POST["v"];        
        
        if ($v == 1) {
            $sql = "UPDATE posts SET likes = likes + 1 WHERE id = 1";  //Update likes on database
        } else if ($v == 0) {
            $sql = "UPDATE posts SET likes = likes - 1 WHERE id = 1";
        } else {
            $sql = "";
        }
        $query = mysqli_query($db, $sql);
        
        if ($query === true) {

        } else {
            echo "Update Query failed where v=".$v;
            exit();
        }
        
        $sql = "SELECT likes FROM posts WHERE id = 1 LIMIT 1";  //Get amount of likes
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($query);
        
        if (count($data) == 0) {
            echo "No table row found.";
            exit();
        }
        
        echo $data["likes"];  //echo back to vote.js ajax return function
        exit();
    }
?>