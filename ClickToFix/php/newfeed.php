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

                    $sql = "SELECT name FROM issues ORDER BY id DESC"; 
                    $query = mysqli_query($db, $sql); 
                    //$dataname = mysqli_fetch_array($query);

                    $sqlmsg = "SELECT message FROM issues ORDER BY id DESC"; 
                    $querymsg = mysqli_query($db, $sqlmsg);
                    //$datamsg = mysqli_fetch_array($querymsg);
                        
                    $sqltime = "SELECT datetime FROM issues ORDER BY id DESC"; 
                    $querytime = mysqli_query($db, $sqltime);
                    //$datatime = mysqli_fetch_array($querytime);
                        
                    $sqlid = "SELECT id FROM issues ORDER BY id DESC";
                    $queryid = mysqli_query($db, $sqlid);
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
                        
                        //$datamsg = mysqli_fetch_assoc($querymsg);
                        
                        //$datatime = mysqli_fetch_assoc($querytime);

                while ($fetch = mysqli_fetch_assoc($query))
                {
                       // $dataname = mysqli_fetch_assoc($query);
                            
                        $datamsg = mysqli_fetch_assoc($querymsg);
                        
                        $datatime = mysqli_fetch_assoc($querytime);
                    
                        $name = nl2br($fetch['name']);//New Line Break
                        
                        $msg = nl2br($datamsg['message']);//New Line Break
                        
                        $time = nl2br($datatime['datetime']);//New Line Break
                        
                        $timeago = get_timeago(strtotime($time)); //calling the Ago Time function and passing variable time from php database.
                        //'strtotime' converts the time into a string element so the function can mess with it
                        
                        
                        echo  " <div class='panel-heading'><strong> $name </strong></div>";
                        
                        
                        
                        echo " <div class='panel-body'> $msg </div>";
                        
                        echo "<div class='panel-footer'><strong>Posted: </strong> $timeago </div>";
                        echo "<hr>";
                    
                }

 

                        echo "<div  id='feed'>";
    
                        
                            
                            
                         
        
                        echo "<div class='panel-footer'>
                     <button onclick='toggleComment('comment1')'>Comment</button>";
     ?>
                        

 