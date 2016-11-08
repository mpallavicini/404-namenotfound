<?php
    session_start();
    include_once("../php/logincheck.php");
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
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
  
     <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    
    <link href="../dist/css/style.css" rel="stylesheet">
    <link href="../dist/css/my-css.css" rel="stylesheet">
    
    <script src="../js/ajax.js"></script>
    <script src="../js/comment_issue.js"></script>
    <script src="../js/jquery.js"></script>
    
    
   

    
    
    
    
    
    <!-- Custom Fonts -->
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ClickToFix.php"><img class= "logo" src = "../img/logo4.png"></a>
                
            </div>
            <!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-key fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                
                                <!--SEARCH DATABASE MAYBE-->
                                
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class= "active" href="ClickToFix.php"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                        
                    
                        
                        <!-- UI ELEMENTS-->
                        <li class = "active">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class = "word-color"href="ClickToFix.php">Panels and Wells</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                
                                
                                <!-- THIRD LEVEL STUFF-->
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    
                                    <ul class="nav nav-third-level">
                                        <!--THIRD LEVEL STUFF-->
                                        
                                        
                                    </ul>
                                    
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../pages/blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Issues and Problems</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
            
    <div class="container">
	<div class="row">
	<div class="col-lg-12 col-md-offset-0 " >
		
		
        
        
        <!--************POSTING UPDATES**************-->
        
        
        

		<form id ="upload" action="../php/issue.php" method="post"  enctype="multipart/form-data" class="facebook-share-box">
			
			
			<div class="share">
				
				<div class="panel panel-default">
                      <div class="panel-heading"><i class="fa fa-file"></i> Post an Issue</div>
                      <div class="panel-body">
                        <div class="padding-issue-name">
                            <textarea name = "issueName" cols = "30" rows= "1" id = "status_message" class = "form-control message"  placeholder = "Issue Name e.g. Broken Light"></textarea>
                            
                           <script> function required(message) 
                                {
                                     //if (message.value.length == 0)
                                     // { 
                                       //  alert("message");  	
                                       //  return false; 
                                     // }  	
                                     // return true; 
                                    } 

                               </script>
                            <textarea name="message" cols="30" rows="4" id="status_message" placeholder= "Description of Issue" class="form-control message"></textarea> 
						</div>
                      </div>
						<div class="panel-footer">
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<div class="btn-group">
											  
                            
                                           
                                                <div class="input-group">
                                       
                                       
                            <input id = "fileInput" class = "btn btn-default" type="file" name="fileInput" >
                                    </div>
                                                
                                <script>
                        $(function() {
/*
                          // We can attach the `fileselect` event to all file inputs on the page
                          $(document).on('change', ':file', function() {
                            var input = $(this),
                                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                            input.trigger('fileselect', [numFiles, label]);
                          });

                          // We can watch for our custom `fileselect` event like this
                          $(document).ready( function() {
                              $(':file').on('fileselect', function(event, numFiles, label) {

                                  var input = $(this).parents('.input-group').find(':text'),
                                      log = numFiles > 1 ? numFiles + ' files selected' : label;

                                  if( input.length ) {
                                      input.val(log);
                                  } else {
                                      if( log ) alert(log);
                                  }

                              });
                          });

                        });*/
                                                
                                                </script>
                                                
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
                                            <!--Locations of all the buildings-->
											<select name="loc" class="form-control privacy-dropdown pull-left input-md">			
                                                <option value="" disabled selected>Please Select Location</option>
                                                <option value="SU80" >Admissions</option>
												<option value="31E">Student Activities Center</option>
                                                <option value="AC67">Tom Oxley Athletic Center</option>
                                                <option value="AD10">Administration, KR Williams</option>
                                                <option value="AG39">Ritter Art Gallery</option>
                                                <option value="AH52">Arts and Humanities</option>
                                                <option value="AL9">College of Arts and Letters, Schmidt</option>
                                                <option value="AU31A">Carole and Barry Kaye Auditorium</option>
                                                <option value="AZ79">Memory and Wellness Center</option>
                                                <option value="BB48">Baseball Stadium</option>
                                                <option value="BC71">College of Medicine, Schmidt</option>
                                                <option value="BK76">Bookstore</option>
                                                <option value="BS12">Behavioral Sciences</option>
                                                <option value="BU86">College of Business</option>
												<option value="CC45">Karen Slattery Ed Res Ctr for Child Dev</option>
                                                <option value="CC455">Peter and Nona Gordon Library/Media Center</option>
                                                <option value="CE31D">Continuing Education Hall</option>
                                                <option value="CM22">Computer Center</option>
                                                <option value="CO69">Campus Operations, Police, Traffic and Parking</option>
                                                <option value="CU97">Culture and Society Building, Living Room Theaters</option>
                                                <option value="DM6">Nations North - Algonquin</option>
                                                <option value="DM70E">Indian River East Tower</option>
                                                <option value="DM70W">Indian River West Tower</option>
                                                <option value="DM89N">Heritage Park North Tower</option>
                                                <option value="DM89S">Heritage Park South Tower</option>
                                                <option value="DM92N">Galdes Park North Tower</option>
                                                <option value="DM92S">Glades Park South Tower</option>
                                                <option value="DP49">Glades Davis Pavillion</option>
                                                <option value="DS86">Desantis Pavillion</option>
                                                <option value="ED47">College of Education</option>
                                                <option value="EE">College of Engineering</option>
                                                <option value="EE96">Engineering East</option>
                                                <option value="EG36">Engineering West</option>
                                                <option value="FA94">Alumni Center, Marleen and Harold Forkas</option>
                                                <option value="FH11">Athletic Field House - Pool</option>
                                                <option value="FL24">Fleming Hall</option>
                                                <option value="FOOD">Food and Services</option>
                                                <option value="FS100">FAU Stadium</option>
                                                <option value="FW11A">Athletic Field House West</option>
                                                <option value="FW11">Fleming West</option>
                                                <option value="GN73">General Classroom North</option>
                                                <option value="GP92">Glades Park Tower</option>
                                                <option value="GS2">General Classroom South</option>
                                                <option value="GY38">Arena</option>
                                                <option value="HP89">Heritage Park Towers</option>
                                                <option value="HS26">AD Henderson Univ School</option>
                                                <option value="IG41">Information Booth</option>
                                                <option value="IR70">Indian River Towers</option>
                                           
											</select>                                   
											<input id = "fileInput" type="submit" name="submit" value="Post" class="btn right btn-primary"> 
                                            <button type="button" value="Clear" onclick= "javascript:eraseText();" class="btn btn-danger">Cancel</button>
                                            
                                           <script> 
                                               function eraseText() {
                                                   document.getElementById("status_message").value = "";
                                               }
                                            </script>

										</div>
									</div>
								</div>
						</div>
                    </div>
			</div>
			
		</form>
	</div>
	</div>
	</div> 

            
            
            
            <!-- /.row -->
            <div class="row">
            
                
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                          <script>
                        $(document).ready(function(){
                        //$("#loader").hide();
                        
                        $("#feed").load("../php/newfeed.php");
                    
                            
                        
                    });               
                    </script>
                        
                        <div  id="feed">
                            <div class="panel-footer">
                            <button onclick="toggleComment('comment1')">Comment</button>
                            
                        </div>
                            
                            <div id="loader" >Loading.....</div>
                            
                            
                        
                            
                           
        
                        
                        
                        
                        
                        </div>
                        <div class="panel-footer" style="display: none" id="comment1">
                            <p>Hello, I am a comment.</p>
                        </div>
        
                        
                       </div>
                    
                    </div>
                    <br><br>
                </div>
                
            <!-- /.row -->
           
            <!-- /.row -->
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </div>
<!--    <!-- jQuery 
   <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript 
    <script src="../dist/js/sb-admin-2.js"></script>

    -->
    
    
   
       <!-- jQuery -->
     <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="js/ajax.js"></script>

</body>

</html>
