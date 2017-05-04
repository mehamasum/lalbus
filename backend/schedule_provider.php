<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/5/2017
 * Time: 12:30 AM
 */

session_start();
include_once ('dbconnect.php');
$schedule_id=mysqli_real_escape_string($conn,$_POST['id']);
$mode=mysqli_real_escape_string($conn,$_POST['m']);
$bus_id=mysqli_real_escape_string($conn,$_POST['b']);
$user=$_SESSION['id'];
$sql = "select * from users WHERE id=$user";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$level=$row['level'];
$bus=$row['bus_id'];
if($level==0)
{
    echo "UNAUTHORIZED";
    die();
}
else if($level==1 && $bus_id!=$bus )
{
    echo "UNAUTHORIZED";
    die();
}


if($mode==0)
{
    $sql = "select * from schedule WHERE id=$schedule_id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $trip_type=$row['trip_type'];
    $time=$row['time'];
    $endpoint=$row['endpoint'];
    $driver=$row['driver'];
    $bus_number=$row['bus_number'];
    $comment=$row['comment'];
}
else
{
    $trip_type=0;
    $time="";
    $endpoint="";
    $driver="";
    $bus_number="";
    $comment="";
}

$post_data = array(
    'item' => array(
        'trip_type' => $trip_type,
        'time' => $time,
        'endpoint' => $endpoint,
        'driver' => $driver,
        'bus_number' => $bus_number,
        'comment' => $comment
    )
);

echo json_encode($post_data);

?>