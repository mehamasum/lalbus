<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 3:59 AM
 */


session_start();
include_once ('dbconnect.php');
if(!isset($_SESSION['id']))
{
    echo "ERR";
    die();
}

$bus_id=mysqli_real_escape_string($conn,$_POST['bus_id']);
$user = $_SESSION['id'];


//"bus_id="+bus_id+"&stoppage_name="+stoppage+"&lat="+latitude+"&lng="+longitude+"&stoppage_type="+trip_type+"&remarks="+remarks+"update_type="+update_type);
$update_type=mysqli_real_escape_string($conn,$_POST['update_type']);
$stoppage_name=mysqli_real_escape_string($conn,$_POST['stoppage_name']);
$lat=mysqli_real_escape_string($conn,$_POST['lat']);
$lng=mysqli_real_escape_string($conn,$_POST['lng']);
$stoppage_type=mysqli_real_escape_string($conn,$_POST['stoppage_type']);
$remarks=mysqli_real_escape_string($conn,$_POST['remarks']);


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
$sql="INSERT INTO `places_request` (`id`, `update_type`, `stoppage_name`, `lat`, `lng`, `bus_id`, `stoppage_type`, `remarks`, `user_id`, `requested_on`) VALUES (NULL, '$update_type', '$stoppage_name', '$lat', '$lng', '$bus_id', '$stoppage_type', '$remarks', '$user', CURRENT_TIMESTAMP);";
if ($conn->query($sql) == TRUE) {
    echo "ONE";
}
else {
    echo "ERR";
}
?>