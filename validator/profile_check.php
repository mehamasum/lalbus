<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 7:49 PM
 */

include_once(dirname(__FILE__) . "/../backend/dbconnect.php");
$userid=$_SESSION['id'];

$sql = "select * from users WHERE id=$userid";
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

?>
