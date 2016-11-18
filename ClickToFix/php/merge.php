<?php
    if (isset($_POST["i"])) {
        session_start();
        include_once("db_connect.php");
        include_once("check_permission.php");
        
        $ids = json_decode($_POST["i"]);
        $length = count($ids);
        
        if ($length == 0 || $length == 1) {
            die("Select at least two issues!");
        } else {
            $ids_string = "";
            for ($i = 1; $i < $length; $i++) {
                $ids_string .= $ids[$i];
                if ($i != $length - 1) {
                    $ids_string .= ',';
                }
            }
            
            $sql = "UPDATE images SET issue_id=".$ids[0]." WHERE issue_id IN ($ids_string)";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "UPDATE comments SET issue_id=".$ids[0]." WHERE issue_id IN ($ids_string)";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            $sql = "DELETE FROM issues WHERE id IN ($ids_string)";
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            echo "success";
            exit();
        }
    }
?>

