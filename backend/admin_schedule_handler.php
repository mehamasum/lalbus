<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 12:17 PM
 */


include_once ('dbconnect.php');

$sid = $_POST['id'];
$bus=$_POST['b'];
$sql = "select * from bus";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonArr = array();

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;


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