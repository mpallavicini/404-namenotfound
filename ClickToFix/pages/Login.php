<?php
    session_start();

    include_once("../php/check_login_status.php");

    if ($user_ok) {
        header("location: ClickToFix.php");
        //header("location: ClickToFix.php");
        exit();
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

    <title>Campus Snapshot Login</title>
    
    <script src="../js/ajax.js"></script>
    <script src="../js/misc.js"></script>
    <script src="../js/login.js"></script>
    
    <script src="../js/https_redirect.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href = "../dist/css/my-css.css" rel = "stylesheet" type = "text/css">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class = "col-md-4 col-md-offset-4">
            
                <div class= "login-panel panel panel-default">
                    <div class= "panel-heading">
                        <h3 class="panel-title">Hello</h3>
                    </div>
                    <div class="panel-body">
                        <h1>Click To Fix is a website designed and implemented by FAU students.  The purpose of lickToFix is to let the university administatraion know if there are any issues on campus that need to be addressed.</h1>
                    </div>
                
                </div>
            
            </div>
            <div class="right-align col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form id="loginform" onsubmit="return false;">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" type="email" onfocus="emptyElement('status')" maxlength="100" autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" type="password" onfocus="emptyElement('status')" maxlength="100">
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" id="remember" type="checkbox">Remember Me
                                    </label>
                                </div>
                                
                                <button id="loginbtn" onclick="login()" class="btn btn-lg btn-success btn-block">Log In</button>
                                <br>
                                <div id="status"></div>
                                <br>
                                <a href="../pages/Signup.php">Create an account</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
