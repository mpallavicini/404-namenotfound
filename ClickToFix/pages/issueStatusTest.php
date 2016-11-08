<?php
    session_start();

    include_once("../php/check_login_status.php");
    include_once("../php/logincheck.php");

    $sql = "SELECT name, status, id, status FROM issues LIMIT 2";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($query);
    $issueName1 = $row[0];
    $issueStatus1 = $row[1];
    $issueId = $issueId1 = $row[2];
    $issueStatus1 = $row[3];

    $row = mysqli_fetch_row($query);
    $issueName2 = $row[0];
    $issueStatus2 = $row[1];
    $issueId2 = $row[2];
    $issueStatus2 = $row[3];

    if ($issueStatus1 == "reported") {
        $issueStatus1 = "Reported";
    } else if ($issueStatus1 == "acknowledged") {
        $issueStatus1 = "Acknowledged";
    } else if ($issueStatus1 == "in_progress") {
        $issueStatus1 = "In Progress";
    } else if ($issueStatus1 == "resolved") {
        $issueStatus1 = "Resolved";
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
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/misc.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/updateStatus.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/delete.js"></script>
    
    <?php
        require_once("../php/delete_confirm.php");
        require_once("../php/merge_confirm.php");
    ?>
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
                                echo "$issueName1(ID:$issueId1)<br><div id='issueStatus'>Status: $issueStatus1</div>"; ?></p>
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
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Issue" data-message="Are you sure you want to delete this issue?">
                                <i class="glyphicon glyphicon-trash"></i> Delete
                            </button>
                        
                            <br><br><br><br>
                            <p>Merge below issue into above issue test:</p>
                            <p><?php
                                echo "$issueName2(ID:$issueId2)<br><div id='issueStatus'>Status: $issueStatus2</div>"; ?></p>
                            <br><br>
                        
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmMerge" data-title="Merge Issues" data-message="Are you sure you want to merge '<?php echo $issueName2; ?>' into '<?php echo $issueName1; ?>'?">
                                <i class="glyphicon glyphicon-duplicate"></i> Merge
                            </button>
                            
                            <br><br><br>
                            <strong id="status"></strong>
                        
                            <br><br><br>
                            <button id="logoutbtn" onclick="logout()" class="btn btn-lg btn-success btn-block">Log Out</button>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
