<?php
    session_start();
    include_once("../php/logincheck.php");
    include_once ("../php/issue.php");
    include_once("../php/currentUser.php");

    $sql = "SELECT user_permission FROM users WHERE user_no=".$_SESSION['userid']." AND activated=1 LIMIT 1";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);
    $user_permission = $data["user_permission"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

	
	
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
	
	
	
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
    
    <script src="../js/misc.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/comment_issue.js"></script>
    <script src="../js/vote.js"></script>
    <script src="../js/jquery.js"></script>
        
    <script src="../js/https_redirect.js"></script>
    
    <script src="../js/delete.js"></script>
    <script src="../js/merge.js"></script>
    <script src="../js/search.js"></script>
    
    
    <!-- Custom Fonts -->
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <h4 class='white'>Welcome Back,
        <?php
        echo userNameByEmail($_SESSION['useremail']);
        ?>
    </h4>
    
    
    <!-- The Modal -->
    <div id="myModal" class="modal" onclick="document.getElementById('myModal').style.display='none'">

      <!-- The Close Button -->
      <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01" src="">

      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>
    
    <div id="wrapper">
        
        
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <div class="navbar-header">
                
                
                <a class="navbar-brand" href="ClickToFix.php"><img class= "logo" src = "../img/logo4.png"></a>
                
            </div>
            <!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
                
<!--     In case we want to implement the notifications menus     -->    
                <!-- /.dropdown -->
   
                <!-- /.dropdown -->
                <li class="dropdown float">
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
                <li class="dropdown float">
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
    
                
    <li class= "dropdown float">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
    </li>
    
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <?php
                    if ($user_permission == 1) {
                        require_once("../php/delete_confirm.php");
                        require_once("../php/merge_confirm.php");
                    }
                ?>   
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <li class="sidebar-search">
                            <div>
                                
                                <!--SEARCH DATABASE MAYBE-->
                                
                                <input type="text" id="search_field" class="form-control" onkeyup="search(this.value)" placeholder="Search...">
                                <span class="input-group-btn">
                                <!--
                                <button class="btn btn-default" type="button" onclick="search(_('search_field').value)">
                                    <i class="fa fa-search"></i>
                                </button>!-->
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
    
                        <li>
                            <a class= "active" href="ClickToFix.php"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                        
                    
                        
                        <!-- UI ELEMENTS-->
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>About Us</a>
                            
                                
                            
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
                    <h1 class="page-header">Issue Feed</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
            
    <div class="container">
	<div class="row">
	<div class="col-lg-12 col-md-offset-0 " >
		
		
        
        
        <!--************POSTING UPDATES**************-->
        
        
        

		<form id ="upload" action="../pages/ClickToFix.php" method="post"  enctype="multipart/form-data" class="facebook-share-box">
			
			
			<div class="share">
				
				<div class="panel panel-default">
                      <div class="panel-heading"><i class="fa fa-file"></i> Post an Issue</div>
                      <div class="panel-body">
                        <div class="padding-issue-name">
                            <textarea name = "issueName" cols = "30" rows= "1" id = "status_name" class = "form-control message"  placeholder = "Issue Name e.g. Broken Light" required></textarea>
                            
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
                            <textarea name="message" cols="30" rows="4" id="status_message" placeholder= "Description of Issue" class="form-control message" required></textarea> 
						</div>
                      </div>
						<div class="panel-footer">
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<div class="btn-group">
											  
                            
                                           
                                                <div class="input-group">
                                       
                                       
                            <input id = "fileInput" class = "btn btn-default" type="file" name="fileInput" required>
                                    </div>
                                               
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="right form-group">
                                            <!--Locations of all the buildings-->
											<select name="loc" id="status_loc" class="form-control privacy-dropdown pull-left input-md" required>			
                                                <option value="" disabled selected>Please Select Location</option>
                                                <option value="Use Geo Location" >Use Geo Location</option>
						                      <option value="Admissions" >Admissions</option>
						                      <option value="Student Activities Center">Student Activities Center</option>
                                                <option value="Tom Oxley Athletic Center">Tom Oxley Athletic Center</option>
                                                <option value="Administration, KR Williams">Administration, KR Williams</option>
                                                <option value="Ritter Art Gallery">Ritter Art Gallery</option>
                                                <option value="Arts and Humanities">Arts and Humanities</option>
                                                <option value="College of Arts and Letters, Schmidt">College of Arts and Letters, Schmidt</option>
                                                <option value="Carole and Barry Kaye Auditorium">Carole and Barry Kaye Auditorium</option>
                                                <option value="Memory and Wellness Center">Memory and Wellness Center</option>
                                                <option value="Baseball Stadium">Baseball Stadium</option>
                                                <option value="College of Medicine, Schmidt">College of Medicine, Schmidt</option>
                                                <option value="Bookstore">Bookstore</option>
                                                <option value="Behavioral Sciences">Behavioral Sciences</option>
                                                <option value="College of Business">College of Business</option>
												<option value="Karen Slattery Ed Res Ctr for Child Dev">Karen Slattery Ed Res Ctr for Child Dev</option>
                                                <option value="Peter and Nona Gordon Library/Media Center">Peter and Nona Gordon Library/Media Center</option>
                                                <option value="Continuing Education Hall">Continuing Education Hall</option>
                                                <option value="Computer Center">Computer Center</option>
                                                <option value="Campus Operations, Police, Traffic and Parking">Campus Operations, Police, Traffic and Parking</option>
                                                <option value="Culture and Society Building, Living Room Theaters">Culture and Society Building, Living Room Theaters</option>
                                                <option value="Nations North - Algonquin">Nations North - Algonquin</option>
                                                <option value="Indian River East Tower">Indian River East Tower</option>
                                                <option value="Indian River West Tower">Indian River West Tower</option>
                                                <option value="Heritage Park North Tower">Heritage Park North Tower</option>
                                                <option value="Heritage Park South Tower">Heritage Park South Tower</option>
                                                <option value="Galdes Park North Tower">Galdes Park North Tower</option>
                                                <option value="Glades Park South Tower">Glades Park South Tower</option>
                                                <option value="Glades Davis Pavillion">Glades Davis Pavillion</option>
                                                <option value="Desantis Pavillion">Desantis Pavillion</option>
                                                <option value="College of Education">College of Education</option>
                                                <option value="College of Engineering">College of Engineering</option>
                                                <option value="Engineering East">Engineering East</option>
                                                <option value="Engineering West">Engineering West</option>
                                                <option value="Alumni Center, Marleen and Harold Forkas">Alumni Center, Marleen and Harold Forkas</option>
                                                <option value="Athletic Field House - Pool">Athletic Field House - Pool</option>
                                                <option value="Fleming Hall">Fleming Hall</option>
                                                <option value="Food and Services">Food and Services</option>
                                                <option value="FAU Stadium">FAU Stadium</option>
                                                <option value="Athletic Field House West">Athletic Field House West</option>
                                                <option value="Fleming West">Fleming West</option>
                                                <option value="General Classroom North">General Classroom North</option>
                                                <option value="Glades Park Tower">Glades Park Tower</option>
                                                <option value="General Classroom South">General Classroom South</option>
                                                <option value="Arena">Arena</option>
                                                <option value="Heritage Park Towers">Heritage Park Towers</option>
                                                <option value="AD Henderson Univ School">AD Henderson Univ School</option>
                                                <option value="Information Booth">Information Booth</option>
                                                <option value="Indian River Towers">Indian River Towers</option>
                                           
											</select>           
                                            
											<input id = "fileInput" type="submit" name="submit" value="Post" class="btn btn-primary" required> 
                                            <button type="button" value="Clear" onclick= "javascript:eraseText();" class="btn btn-danger">Cancel</button>
                                            <br>
                                            <div class="right">
                                                <label class="font">
                                                    <input  type="checkbox" name="anonymous" value="Yes"> Post Anonymously
                                                </label>
                                                <a href="myPost.php">click here</a>
                                            </div>
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
        
        <?php
            if ($user_permission == 1) {
               echo '<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Issue(s)" data-message="Are you sure you want to delete the selected issues?">
            <i class="glyphicon glyphicon-trash"></i> Delete
        </button>
        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmMerge" data-title="Merge Issues" data-message="Are you sure you want to merge the selected issues??">
            <i class="glyphicon glyphicon-duplicate"></i> Merge
        </button>'; 
            }
        ?>
        
	</div>
	</div>
	</div> 

            
            
            
            <!-- /.row -->
            <div class="row">
            
                
                
                <div class="col-lg-12">
                    <div class="panel panel-default"><!--
                          <script>
                        $(document).ready(function(){
                        //$("#loader").hide();
                        
                        $("#feed").load("../php/newfeed.php");
                        
                    });               
                    </script>!-->
                        <div id="loader" >Loading.....</div>
                        <div  id="feed">
                            <!-- <div class="comment panel-footer">
                             <button onclick="toggleComment('comment1')">Comment</button>>
                            
                        </div> !-->
                            
                   <div class="row">
                       <div class="col-md-6">
                           <div class="panel-heading">
                                <input type='checkbox' name='checkbox' value='" + id + "'> 
                                <strong>name</strong>
                           </div>
                    
                           <div class='panel-body'>" + message + "
                           </div>
                    
                        </div>
                       <div class='panel-body col-md-4'>
                    
                    <img class="max image_popup" alt="' + name + '" id="image_' + i + '" src="../img/Loading_icon.gif" />
                    
                        </div>
                 </div>
                    
                    <div class='block panel-footer'>
                        <strong>Posted By: </strong>" + user + "<strong></strong> " + time + "
                         
                            <div class='align-right'>                    <strong>Issue(s) reported at               </strong>" + location
                            </div>
                    </div>        
                            
                            
                        
                            
                           
        
                        
                        
                        
                        
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
    
    <script>search('', '<?php echo $_SESSION["useremail"]; ?>')</script>
    
</body>

</html>
