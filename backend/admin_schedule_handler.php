<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 12:17 PM
 */


include_once ('dbconnect.php');
session_start();

$sid = $_POST['id'];
$bus=$_POST['b'];
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


if($level==2)
    $sql="select * from schedule";
else
    $sql = "select * from schedule WHERE bus_id=$bus";

$result = $conn->query($sql);

$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;

echo json_encode($jsonArr)."\n";
?>