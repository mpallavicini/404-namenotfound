<?php
    session_start();

    include_once("../php/check_login_status.php");
    include_once("../php/logincheck.php");

    $sql = "SELECT name, status, id, status FROM issues WHERE id=112";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($query);
    $issueName = $row[0];
    $issueStatus = $row[1];
    $issueId = $row[2];
    $issueStatus = $row[3];

    if ($issueStatus == "reported") {
        $issueStatus = "Reported";
    } else if ($issueStatus == "acknowledged") {
        $issueStatus = "Acknowledged";
    } else if ($issueStatus == "in_progress") {
        $issueStatus = "In Progress";
    } else if ($issueStatus == "resolved") {
        $issueStatus = "Resolved";
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

    <title>Campus Snapshot Issue Status</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="../js/misc.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/updateStatus.js"></script>
    <script src="../js/logout.js"></script>
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <p><?php if ($user_ok) {
                            echo "User '$log_email' is logged in."; }
                            else echo "Not logged in."; ?></p><br>
                            
                            <p><?php
                                echo "$issueName:<br><div id='issueStatus'>Status: $issueStatus</div>"; ?></p>
                            <br>
                            
                            <select onchange="updateStatus(<?php echo $issueId; ?>, this.value)"
                                    value="<?php echo $issueStatus; ?>"></selec>>
                                <option id="reported" value="reported"
                                        <?php if ($issueStatus == "reported")
                                        echo "selected='selected'"; ?>>Reported</option>
                                <option id="acknowledged" value="acknowledged"
                                        <?php if ($issueStatus == "acknowledged")
                                        echo "selected='selected'"; ?>>Acknowledged</option>
                                <option id="in_progress" value="in_progress"
                                        <?php if ($issueStatus == "in_progress")
                                        echo "selected='selected'"; ?>>In Progress</option>
                                <option id="resolved" value="resolved"
                                        <?php if ($issueStatus == "resolved")
                                        echo "selected='selected'"; ?>>Resolved</option>
                            </select>
                            
                            <br><br>
                            <div id="status"></div>
                        
                            <br><br><br>
                            <button id="logoutbtn" onclick="logout()" class="btn btn-lg btn-success btn-block">Log Out</button>
                        </h3>

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
