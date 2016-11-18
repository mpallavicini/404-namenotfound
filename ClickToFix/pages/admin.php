<?php
    session_start();

    include_once("../php/check_login_status.php");
    include_once("../php/logincheck.php");
    include_once("../php/check_permission.php");
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
    <script src="../js/merge.js"></script>
    <script src="../js/search.js"></script>
    
    <script>search('');</script>
    
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
                    <div>
                        <label>Search</label>
                        <input type="text" id="search" class="form-control" onkeyup="search(this.value)">
                        <br><br>
                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Issue(s)" data-message="Are you sure you want to delete the selected issues?">
                            <i class="glyphicon glyphicon-trash"></i> Delete
                        </button>
                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmMerge" data-title="Merge Issues" data-message="Are you sure you want to merge the selected issues??">
                                <i class="glyphicon glyphicon-duplicate"></i> Merge
                            </button>
                        <br>
                        <div id="status"></div>
                        <br>
                        <table class="table" id="data_table">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Date/Time</th>
                                <th><input type="checkbox" class="form-control" onclick="toggleCheckboxes(this)"></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
