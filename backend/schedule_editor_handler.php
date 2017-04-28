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

$time=$_POST['time'];
$trip_type=$_POST['trip_type'];
$driver=$_POST['driver'];
$bus_no=$_POST['bus_no'];
$endpoint=$_POST['endpoint'];
$comment=$_POST['comment'];
$mode=$_POST['mode'];
$id=$_POST['id'];
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

if($mode==0) { // Update
    $sql="UPDATE schedule SET time='$time',trip_type='$trip_type',driver='$driver',bus_number='$bus_no',endpoint='$endpoint',comment='$comment' where id=$id;";
    echo $sql;
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
else { // Insert
    $sql="INSERT INTO `schedule` (`id`, `bus_id`, `trip_type`, `time`, `start_point`, `driver`, `bus_number`, `comment`) VALUES (NULL, '$bus_id', '$trip_type', '$time', '$endpoint', '$driver', '$bus_no', '$comment');";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}

?>