<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 7:49 PM
 */
session_start();
require_once('dbconnect.php');
$user_id=$_SESSION['id'];

$sql = "select * from users WHERE id=$user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name=$row['name'];
$reg_no=$row['reg_no'];
$mob_no=$row['mob_no'];
$email=$row['email'];
/*$password=$row['password'];*/
$dept_id=$row['dept_id'];
$bus=$row['bus_id'];
$user_level=$row['level_req'];


$post_data = array(
    'item' => array(
        'id' => $user_id,
        'name' => $name,
        'reg_no' => $reg_no,
        'mob_no' => $mob_no,
        'email' => $email,
        'dept_id' => $dept_id,
        'bus_id' => $bus,
        'level' => $user_level
    )
);

echo json_encode($post_data);

?>
