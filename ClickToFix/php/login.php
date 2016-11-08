<?php
    if (isset($_POST["e"])) {
        session_start();
        include_once("db_connect.php");
        
        $e = $_POST['e'];
        $p = crypt($_POST['p'], '$saltlife$');
        
        $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

        if ($e == "" || $p == "") {
            echo "login_failed";
            exit();
        } else {
            $sql = "SELECT user_no, email, password FROM users WHERE email='$e' AND activated='1' LIMIT 1";
            $query = mysqli_query($db, $sql);
            $row = mysqli_fetch_row($query);
            $db_id = $row[0];
            $db_useremail = $row[1];
            $db_pass_str = substr(substr($row[2], 0, -20), 20);
            if ($p != $db_pass_str) {
                echo "login_failed";
                exit();
            } else {
                $_SESSION['userid'] = $db_id;
                $_SESSION['useremail'] = $db_useremail;
                $_SESSION['password'] = $db_pass_str;
                if (isset($_POST['r'])) {
                    setcookie("id", $db_id, strtotime('+30 days'), "/", "", "", TRUE);
                    setcookie("email", $db_useremail, strtotime('+30 days'), "/", "", "", TRUE);
                    setcookie("pass", $row[2], strtotime('+30 days'), "/", "", "", TRUE);
                }
                $sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE user_no='$db_id' LIMIT 1";
                $query = mysqli_query($db, $sql);
                echo $db_useremail;
                exit();
            }
        }
        exit();
    }
?>