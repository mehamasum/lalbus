<?php
/**
 * Created by PhpStorm.
 * User: mehamasum
 * Date: 4/24/2017
 * Time: 12:12 AM
 */



$bus_id = $_POST['b'];
$user = $_POST['u'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

include_once ('dbconnect.php');

// TODO: dynamically create reports table for new bus in dasboard

$sql = "INSERT INTO reports".$bus_id." (`id`, `bus_id`, `user_id`, `lat`, `lng`, `time`, `pos_cnt`, `neg_cnt`) 
        VALUES (NULL, '$bus_id', '$user', '$lat', '$lng', NOW(), 0, 0)";
if ($conn->query($sql) == TRUE) {
    echo "ONE";
}
else {
    echo "ERR";
}
