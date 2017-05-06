<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/25/2017
 * Time: 12:22 AM
 */

include_once ('dbconnect.php');

$sid = mysqli_real_escape_string($conn, $_POST['id']);

$sql = "select * from  `users` WHERE  (`level_req` =1 and `level`=0);";
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


$sql = "select * from depts";

$result = $conn->query($sql);

$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

$jsonArr[] = $jsonData;


echo json_encode($jsonArr)."\n";

?>