<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/30/2017
 * Time: 3:33 AM
 */

require_once('dbconnect.php');


$jsonArr = array();

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