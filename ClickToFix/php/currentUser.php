<?php
function currentUsername()
{
    require("db_connect.php");

    $userId = $_SESSION["userid"];  
    
    $sql = "SELECT firstname FROM users WHERE user_no='$userId'";
    
    $result = mysqli_query($db, $sql)  or die('SQL Error :: '.mysql_error());
    
    $row = mysqli_fetch_assoc($result);

    echo $row['firstname'];
}

function currentUserFullname()
{
    require("db_connect.php");

    $userId = $_SESSION["userid"];  
    
    $sql = "SELECT firstname, lastname FROM users WHERE user_no='$userId'";
    
    $result = mysqli_query($db, $sql)  or die('SQL Error :: '.mysql_error());
    
    $row = mysqli_fetch_assoc($result);

    echo $row['firstname']." ".$row['lastname'];

}
    
?>