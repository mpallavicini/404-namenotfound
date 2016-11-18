<?php
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
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_array($query);

        $admin = false;
        if ($data[0] == 1) {
            $admin = true;
        }
        
        $search = $_POST["s"];
        
        $sql = "SELECT id, name, message, datetime, location, likes FROM issues WHERE name LIKE '%".$search."%' OR message LIKE '%".$search."%' ORDER BY datetime DESC";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        $ids = [];
        $names = [];
        $messages = [];
        $times = [];
        $locations = [];
        $likes = [];

        $i = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            $ids[$i] = $data['id'];
            $names[$i] = $data['name'];
            $messages[$i] = $data['message'];
            $times[$i] = get_timeago(strtotime($data['datetime']));
            $locations[$i] = $data['location'];
            $likes[$i] = $data['likes'];
            $i++;
        }

        $total_items = count($ids);
        
        echo json_encode(array('success', $total_items, $admin, $ids, $names, $messages, $times, $locations, $likes));
        exit();
    }

    if (isset($_POST["i"])) {
        include_once("db_connect.php");
        
        $issue_id = $_POST["i"];
        
        $sql = "SELECT image FROM issues WHERE id=$issue_id";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        $data = mysqli_fetch_array($query);

        echo base64_encode($data[0]);
        exit();
    }
?>

