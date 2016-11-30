
<?php
include_once("currentUser.php");
    function get_timeago($ptime) {
        $estimate_time = time() - $ptime;
        if($estimate_time < 1) {
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
        foreach($condition as $secs => $str) {
            $d = $estimate_time / $secs;
            if($d >= 1) {
                $r = round( $d );
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    if (isset($_POST["s"])) {
        session_start();
        include_once("db_connect.php");
        date_default_timezone_set("America/New_York");
                    
        $sql = "SELECT user_permission FROM users WHERE user_no=".$_SESSION['userid'];
        $query = mysqli_query($db, $sql) or die(json_encode(mysqli_error($db)));
        $data = mysqli_fetch_array($query);
        $admin = false;
        if ($data[0] == 1) {
            $admin = true;
        }

        $string = $_POST['s'];   
        //seperating the string using explode function
        $words = explode(" ",$string);
        $wordCount = count($words);
        $firstWord = "%".$words[0]."%";
        $sql = "SELECT id, name, message, datetime, location, likes, anonymity, user FROM issues WHERE (CONVERT( name USING utf8 ) LIKE '$firstWord') OR (CONVERT( message USING utf8 ) LIKE '$firstWord')";
        if($wordCount>1)
        {
            for($i=1; $i<$wordCount; $i++)
            {
                $wordToConvert = "%".$words[$i]."%";
                $sql .= "OR (CONVERT(  `name` USING utf8 ) LIKE '$wordToConvert') or (CONVERT( message USING utf8 ) LIKE '$firstWord')";
            }
        }
        
        $sql .= " ORDER BY datetime DESC";
        
        $query = mysqli_query($db, $sql) or die(json_encode(mysqli_error($db)));
        
        $ids = [];
        $names = [];
        $messages = [];
        $times = [];
        $locations = [];
        $likes = [];
        $anonymity = [];
        $user = [];
        $username = [];
        
        $owners = [];
        $comments = [];
        $commentTimes = [];
        $commentLikes = [];
        
        $id_string = "";
        $i = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            $ids[$i] = $data['id'];
            $id_string .= $data['id'] . ',';
            $names[$i] = $data['name'];
            $messages[$i] = $data['message'];
            $times[$i] = get_timeago(strtotime($data['datetime']));
            $locations[$i] = $data['location'];
            $likes[$i] = $data['likes'];
            $anonymity[$i] = $data['anonymity'];
            $user[$i] = $data['user'];
            if($anonymity[$i]==1) {$username[$i] = "Anonymous";}
            else{$username[$i] = userNameByEmail($user[$i]);}
            
            $sql = "SELECT comment, owner, datetime, votes FROM comments WHERE issue_id=$ids[$i] ORDER BY datetime DESC";
        
            $comment_query = mysqli_query($db, $sql) or die(json_encode(mysqli_error($db)));

            $owners_this = [];
            $comments_this = [];
            $commentTimes_this = [];
            $commentLikes_this = [];

            while ($comment_data = mysqli_fetch_assoc($comment_query)) {
                array_push($owners_this, $comment_data['owner']);
                array_push($comments_this, $comment_data['comment']);
                array_push($commentTimes_this, $comment_data['datetime']);
                array_push($commentLikes_this, $comment_data['votes']);
            }
            
            array_push($owners, $owners_this);
            array_push($comments, $comments_this);
            array_push($commentTimes, $commentTimes_this);
            array_push($commentLikes, $commentLikes_this);
            
            $i++;
        }
        
        $total_items = count($ids);
        
        echo json_encode(array('success', $total_items, $admin, $ids, $names, $messages, $times, $locations, $likes, $anonymity, $username, $owners, $comments, $commentTimes, $commentLikes));
        exit();
    }
    if (isset($_POST["i"])) {
        include_once("db_connect.php");
        
        $issue_id = $_POST["i"];
        
        $sql = "SELECT image FROM issues WHERE id=$issue_id";
        $query = mysqli_query($db, $sql) or die(json_encode(mysqli_error($db)));
        $data = mysqli_fetch_array($query);
        echo base64_encode($data[0]);
        exit();
    }
?>
