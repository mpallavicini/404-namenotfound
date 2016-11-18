<?php
    if (isset($_POST["i"])) {
        session_start();
        include_once("db_connect.php");
        include_once("check_permission.php");
        
        $ids = json_decode($_POST["i"]);
        $length = count($ids);
        
        if ($length == 0) {
            die("No issues selected.");
        } else {
            $ids_string = "";
            for ($i = 0; $i < $length; $i++) {
                $ids_string .= $ids[$i];
                if ($i != $length - 1) {
                    $ids_string .= ',';
                }
            }
            
            $sql = "DELETE FROM issues WHERE id IN ($ids_string)";
            $query = mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM images WHERE issue_id IN ($ids_string)";
            $query = mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM comments WHERE issue_id IN ($ids_string)";
            $query = mysqli_query($db, $sql) or die(mysqli_error($db));
            
            echo "success";
            exit();
        }
    }
?>