<?php

include_once ('dbconnect.php');


$sql = "SELECT id, name FROM bus";
$result = $conn->query($sql);
$n = $result->num_rows;

$jsonData = array();
foreach($result as $row){
    $jsonData[] = $row;
}
echo json_encode($jsonData)."\n";

?>