<?php
session_start();

//  xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm);

// no injection
require_once('dbconnect.php');

$name =mysqli_real_escape_string($conn, $_POST['n']);
$reg_no =mysqli_real_escape_string($conn,$_POST['r']);
$mob_no = mysqli_real_escape_string($conn,$_POST['m']);
$email=mysqli_real_escape_string($conn,$_POST['e']);
$password = mysqli_real_escape_string($conn,$_POST['p']);
$comm =  mysqli_real_escape_string($conn,$_POST['c']);
$bus_id = mysqli_real_escape_string($conn,$_POST['b']);

// check for sql injection


$comm = intval($comm);
//echo $comm;

$_SESSION['id']=1;
$_SESSION['name']='fahim';
echo "ONE";
mysqli_close($conn);
?>
