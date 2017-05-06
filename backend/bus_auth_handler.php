<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 1:48 AM
 */

session_start();
include_once ('dbconnect.php');

$sid = $_SESSION['id'];

$sql = "select * FROM `bus_request`;";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonArr = array();

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;


$sql = "select * from users";

$result = $conn->query($sql);

$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;


$sql = "select * from bus";

$result = $conn->query($sql);

$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;

echo json_encode($jsonArr)."\n";


?>

