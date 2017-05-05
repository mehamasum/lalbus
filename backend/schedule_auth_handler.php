<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/5/2017
 * Time: 1:41 AM
 * TODO : INCOMPLETE
 */


include_once ('dbconnect.php');

$sid = mysqli_real_escape_string($conn, $_POST['id']);

$sql = "select * FROM `schedule_request`;";
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

