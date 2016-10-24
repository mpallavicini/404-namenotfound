<?php
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
	include_once("db_connect.php");
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT user_no FROM users WHERE user_name='$username' LIMIT 1";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db)); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}
?>
<?php
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	// CONNECT TO THE DATABASE
	include_once("db_connect.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
    $z = preg_replace('#[^0-9]#', '', $_POST['z']);
    $fn = preg_replace('#[^a-z\s+]#i', '', $_POST['fn']);
    $ln = preg_replace('#[^a-z\s+]#i', '', $_POST['ln']);
    while($fn[strlen($fn)-1] === ' ') {
        $fn = substr($fn, 0, strlen($fn)-1);
    }
    while($ln[strlen($ln)-1] === ' ') {
        $ln = substr($ln, 0, strlen($ln)-1);
    }
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$e = mysqli_real_escape_string($db, $_POST['e']);
	$p = $_POST['p'];
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT user_no FROM users WHERE user_name='$u' LIMIT 1";
    $query = mysqli_query($db, $sql); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT user_no FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($db, $sql); 
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($z == "" || $fn == "" || $ln == "" || $u == "" || $e == "" || $p == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		$cryptpass = crypt($p, '$saltlife$');
		include_once ("randStrGen.php");
		$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		// Add user info into the database table for the main site table
		$sql = "INSERT INTO users(firstname, lastname, user_name, user_zid, email, password, ip, lastlogin)       
		        VALUES('$fn','$ln','$u','$z','$e','$p_hash','$ip',now())";
		$query = mysqli_query($db, $sql); 
		$uid = mysqli_insert_id($db);
		// Email the user their activation link
		$to = "$e";							 
		$from = "edossantos2014@fau.edu";
		$subject = 'ClickToFix Account Activation Link';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>ClickToFix Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://lamp.cse.fau.edu/~edossantos2014/ClickToFix/pages/ClickToFix.php"></a>ClickToFix Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$fn.' '.$ln.'. Z-Number: '.$z.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://lamp.cse.fau.edu/~edossantos2014/ClickToFix/php/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* Username: <b>'.$u.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}
?>