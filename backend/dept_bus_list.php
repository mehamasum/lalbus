<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/27/2017
 * Time: 8:27 PM
 */

require_once('dbconnect.php');

$sql = "SELECT * FROM depts";
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