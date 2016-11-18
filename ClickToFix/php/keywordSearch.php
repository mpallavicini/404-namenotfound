<?php
require("db_connect.php");
include_once("currentUser.php");  //connect for Currentuser


$string = $_POST['searchText'];   
//seperating the string using explode function
$words = explode(" ",$string);

$wordCount = count($words);

$firstWord = "%".$words[0]."%";

$sql = "SELECT * FROM issues WHERE (CONVERT( name USING utf8 ) LIKE '$firstWord')";

if($wordCount>1)
{
    for($i=1; $i<$wordCount; $i++)
    {
        $wordToConvert = "%".$words[$i]."%";
        $sql = $sql."OR (CONVERT(  `name` USING utf8 ) LIKE '$wordToConvert')";
    }
}

//SELECT * FROM  `knakarmi2013`.`issues` WHERE (CONVERT(  `name` USING utf8 ) LIKE  '%test%')OR (CONVERT(  `name` USING utf8 ) LIKE  '%krishu%')OR (CONVERT(  `name` USING utf8 ) LIKE  '%ram%')LIMIT 0 , 30

$sql = $sql." LIMIT 0 , 30";
//echo $sql;
//exit();

$result = mysqli_query($db,$sql);



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

//$data = mysqli_fetch_assoc($result)
    if(mysqli_num_rows($result)==0)
    {
        echo "No Match found";
    }
    else
    {
        while ($data = mysqli_fetch_assoc($result))
                {
                    
                        $id = $data['id'];    
                    
                        $likes = $data['likes'];
                    
                       // $dataname = mysqli_fetch_assoc($query);
                                                                            
                        //$dataloc = mysqli_fetch_assoc($querybuild);
                        //$dataimg = mysqli_fetch_assoc($queryimg);
                                        
                        $name = nl2br($data['name']);//New Line Break
                        
                        $msg = nl2br($data['message']);//New Line Break
                        
                        $time = nl2br($data['datetime']);//New Line Break
                    
                        //fOR POSTING BEING ANONYMITY
                        $userEmail = nl2br($data['user']);//New Line Break
                        $anonymity = nl2br($data['anonymity']);//New Line Break
                        if($anonymity==1)
                        {$user="Anonymous";}
                        else
                        {
                            $user = userNameByEmail($userEmail);
                        }
                        //end for anonimity check            
                    
                        $Location = $data['location'];
                        
                        
                        $timeago = get_timeago(strtotime($time));
                   
                        
                    
                        $imageData = $data['image'];
                        $imgData = base64_encode($imageData);
                    
                        
                    //calling the Ago Time function and passing variable time from php database.

                        //'strtotime' converts the time into a string element so the function can mess with it
                        
                        
                        echo  "<div class='panel-heading'><strong> $name </strong></div>";
                     
                        
                        
                    
                       // echo "<img src='data:image/jpeg;base64,".base64_encode($imageData)."' height='900 width='1024'/>";
                        echo '<img class = "max" src="data:image/jpeg;base64,'.$imgData.'" />';
                        
                        echo " <div class='panel-body'> $msg </div>";
                    
                        echo "<div class='panel-footer'><strong>Posted By: </strong> $user <strong><br> </strong> $timeago<strong> <div class = 'text-left'>Issue(s) reported at:</strong> $Location</div>";
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

}
     
?>



