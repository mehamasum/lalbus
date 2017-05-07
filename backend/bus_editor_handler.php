<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 12:34 AM
 */

session_start();
include_once ('dbconnect.php');
if(!isset($_SESSION['id']))
{
    echo "ERR";
    die();
}

$bus_id=mysqli_real_escape_string($conn,$_POST['id']);
$user = $_SESSION['id'];

$mode=mysqli_real_escape_string($conn,$_POST['mode']);
$route=mysqli_real_escape_string($conn,$_POST['route']);
$remarks=mysqli_real_escape_string($conn,$_POST['remarks']);
$name=mysqli_real_escape_string($conn,$_POST['name']);

$sql = "select * from users WHERE id=$user";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$level=$row['level'];

$sql="INSERT INTO `bus_request` (`id`,`update_type`,`old_id`, `name`, `route`,`remarks`,`user_id`,`timestamp`) VALUES (NULL,'$mode', '$bus_id', '$name', '$route','$remarks','$user', CURRENT_TIMESTAMP);";
echo $sql;
if ($conn->query($sql) == TRUE) {
    echo "ONE";
}
else {
    echo "ERR";
}
?>