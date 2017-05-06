<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 4:34 PM
 */

include_once ('dbconnect.php');
session_start();

$bus=mysqli_real_escape_string($conn, $_POST['b']);
$user=$_SESSION['id'];

$sql = "select * from users WHERE id=$user";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$level=$row['level'];

$sql = "select * from bus";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonArr = array();

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;


$sql = "select * from places WHERE bus_id=$bus";

$result = $conn->query($sql);

$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;

echo json_encode($jsonArr)."\n";
?>