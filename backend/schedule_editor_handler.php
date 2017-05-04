<?php
/**
 * Created by USER on 4/27/2017.
 */

session_start();
include_once ('dbconnect.php');
if(!isset($_SESSION['id']))
{
    echo "ERR";
    die();
}
$mode=$_POST['mode'];
$schedule_id=$_POST['id'];


$time=$_POST['time'];
$trip_type=$_POST['trip_type'];
$driver=$_POST['driver'];
$bus_no=$_POST['bus_no'];
$endpoint=$_POST['endpoint'];
$comment=$_POST['comment'];
$bus_id=$_POST['bus_id'];


$user = $_SESSION['id'];
$sql = "select * from users WHERE id=$user";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$bus=$row['bus_id'];
$level=$row['level'];
if($level==0)
{
    echo "ERR";
    die();
}

    $sql="INSERT INTO `schedule_request` (`id`,`update_type` ,`old_schedule`,`bus_id`, `trip_type`, `time`, `endpoint`, `driver`, `bus_number`, `comment`,`user_id`) VALUES (NULL,'$mode','$schedule_id', '$bus_id', '$trip_type', '$time', '$endpoint', '$driver', '$bus_no', '$comment','$user');";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
?>