<?php
/**
 * Created by USER on 4/27/2017.
 */

//$user = $_SESSION['id'];

include_once ('dbconnect.php');

$time=$_POST['time'];
$trip_type=$_POST['trip_type'];
$driver=$_POST['driver'];
$bus_no=$_POST['bus_no'];
$endpoint=$_POST['endpoint'];
$comment=$_POST['comment'];
$mode=$_POST['mode'];
$id=$_POST['id'];
$bus_id=$_POST['bus_id'];


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