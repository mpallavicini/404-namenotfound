<!--/*
    include_once("../php/db_connect.php");  //connect to database
    
    $sql = "SELECT name FROM issues ORDER BY id DESC"; 
    $query = mysqli_query($db, $sql);

    while ($fetch = mysqli_fetch_assoc($query)){
        $name = nl2br($fetch['name']);
        
        echo "<p>$name</p>";
    }

*/-->



<?php
                    include_once("../php/db_connect.php");  //connect to database
                    date_default_timezone_set("America/New_York");
                    

                    $sql = "SELECT id, name, image, message, datetime, location, likes FROM issues ORDER BY id DESC";
                    $query = mysqli_query($db, $sql);
                    

                   /* $sqlimg = "SELECT image FROM issues ORDER BY id DESC";
                    $queryimg = mysqli_query($db, $sqlimg);
*/
                        //Function to convert the timedat format from php into "Ago Time" ie. "4 hours ago"

                        function get_timeago( $ptime ){
                            $estimate_time = time() - $ptime;

                            if( $estimate_time < 1 )
                            {
                                return 'less than 1 second ago';
                            }

                            $condition = array( 
                                        12 * 30 * 24 * 60 * 60  =>  'year',
                                        30 * 24 * 60 * 60       =>  'month',
                                        24 * 60 * 60            =>  'day',
                                        60 * 60                 =>  'hour',
                                        60                      =>  'minute',
                                        1                       =>  'second'
                            );

                            foreach( $condition as $secs => $str )
                            {
                                $d = $estimate_time / $secs;

                                if( $d >= 1 )
                                {
                                    $r = round( $d );
                                    return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                                }
                            }
                        }

                        //function showImage($id){
                            //echo "test";             
                       // }
                        
                        //$datamsg = mysqli_fetch_assoc($querymsg);
                        
                        //$datatime = mysqli_fetch_assoc($querytime);
                        $variableId=0;
                while ($data = mysqli_fetch_assoc($query))
                {
                    
                        $id = $data['id'];    
                    
                        $likes = $data['likes'];
                    
                       // $dataname = mysqli_fetch_assoc($query);
                                                                            
                        //$dataloc = mysqli_fetch_assoc($querybuild);
                        //$dataimg = mysqli_fetch_assoc($queryimg);
                                        
                        $name = nl2br($data['name']);//New Line Break
                        
                        $msg = nl2br($data['message']);//New Line Break
                        
                        $time = nl2br($data['datetime']);//New Line Break
                        $Location = $data['location'];
                        
                        
                        $timeago = get_timeago(strtotime($time));
                   
                        
                    
                        $imageData = $data['image'];
                        $imgData = base64_encode($imageData);
                    
                        
//calling the Ago Time function and passing variable time from php database.

                        //'strtotime' converts the time into a string element so the function can mess with it
                        
                        
                        echo  "<div class='panel-heading'><strong> $name </strong></div>";
                     
                        
                        echo " <div class='panel-body'> $msg </div>";
                    
                       // echo "<img src='data:image/jpeg;base64,".base64_encode($imageData)."' height='900 width='1024'/>";
                        echo '<img class = "max" src="data:image/jpeg;base64,'.$imgData.'" />';
                        
                        echo "<div class='panel-footer'><strong>Posted: </strong> $timeago<strong> <div class = 'text-left'>Issue(s) reported at:</strong> $Location</div>";
                    //  echo "<div class='container'><div class='row'>";
                       // echo "<div class='panel-footer'>";
                       
                        //echo "</div>";
                        echo "<div class='text-center panel-footer'>";
                    
                        echo "<button class='block btn btn-lg' onclick='vote($variableId, $id, 1)'><i class='fa fa-thumbs-up' aria-hidden='true'></i></button>";
                    
                        echo "<span id='vote_$variableId'>$likes</span>";
                    
                        echo "<button class='block btn btn-lg' onclick='vote($variableId, $id, 0)'><i class='fa fa-thumbs-down' aria-hidden='true'></i> </button> </div>";
                        echo "</div>";//</div>";//</div>";

                    
                        echo "<span class='panel-body' id='status_$variableId'></span>";
                        
                    

                        echo "<button class= 'panel-body' onclick='toggleComment(`comment_$variableId`)' id='comment_$variableId'>Comment</button>";
                    
                      
                        
                    
                     //   echo '<dt><strong>Technician Image:</strong></dt><dd>'
   //  . '<img src="data:image/jpeg;base64,' . base64_encode($img['image']) . '" width="290" height="290">'
  //   . '</dd>';
                        $variableId++;
                        echo "<hr>";
                    
                };
     ?>
            

 
