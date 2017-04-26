<?php

include_once ('dbconnect.php');

//$sid = $_POST['id'];

$sql = "select * from places";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonArr = array();

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