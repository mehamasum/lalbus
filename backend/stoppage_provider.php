<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/6/2017
 * Time: 6:01 PM
 */

require_once('dbconnect.php');
$id=mysqli_real_escape_string($conn,$_POST['s_id']);

$sql = "select * from places WHERE id=$id;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name=$row['stoppage_name'];
$remarks=$row['remarks'];
$stoppage_type=$row['stoppage_type'];
$bus_id=$row['bus_id'];
$lat=$row['lat'];
$lng=$row['lng'];

$sql="select * from bus WHERE id=$bus_id;";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$bus=$row['name'];

$post_data = array(
    'item' => array(
        'name' => $name,
        'lat' => $lat,
        'lng' => $lng,
        'remarks' => $remarks,
        'stoppage_type' => $stoppage_type,
        'bus_name' => $bus,
        'bus_id' => $bus_id
    )
);

echo json_encode($post_data);

?>
