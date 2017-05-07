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
$mode=mysqli_real_escape_string($conn,$_POST['mode']);
$schedule_id=mysqli_real_escape_string($conn,$_POST['id']);


$time=mysqli_real_escape_string($conn,$_POST['time']);
$trip_type=mysqli_real_escape_string($conn,$_POST['trip_type']);
$driver=mysqli_real_escape_string($conn,$_POST['driver']);
$bus_no=mysqli_real_escape_string($conn,$_POST['bus_no']);
$endpoint=mysqli_real_escape_string($conn,$_POST['endpoint']);
$comment=mysqli_real_escape_string($conn,$_POST['comment']);
$bus_id=mysqli_real_escape_string($conn,$_POST['bus_id']);


$user = $_SESSION['id'];
$sql = "select * from users WHERE id=$user";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$level=$row['level'];

$neg_repu=$row['neg_repu'];
if($neg_repu>10)
{
    echo "UNAUTHORIZED";
    die();
}
/*if($level==0)
{
    echo "ERR";
    die();
}*/

    $sql="INSERT INTO `schedule_request` (`id`,`update_type` ,`old_schedule`,`bus_id`, `trip_type`, `time`, `endpoint`, `driver`, `bus_number`, `comment`,`user_id`) VALUES (NULL,'$mode','$schedule_id', '$bus_id', '$trip_type', '$time', '$endpoint', '$driver', '$bus_no', '$comment','$user');";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
?>