<?php
    $message = "";
    $msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
    if($msg == "activation_failure"){
        $message = '<h2>Activation Error</h2>';
    } else if($msg == "activation_success"){
        $message = '<h2>Activation Success</h2> Your account is now activated.';
    } else {
        $message = $msg;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ClickToFix</title>

        <script src="../js/ajax.js"></script>
        <script src="../js/misc.js"></script> 
        <script src="../js/signup.js"></script>
    </head>
<body>
    
    <h1>Message</h1><br><br>

    <p><?php   echo $message;  ?></p><br><br>
    
</body>
</html>