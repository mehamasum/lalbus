<?php

include_once ('dbconnect.php');

$sid = $_POST['id'];

$sql = "SELECT id, name FROM bus WHERE id in (SELECT bus_id FROM `following` WHERE user_id = $sid)";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}

echo json_encode($jsonData)."\n";

?>