<?php
session_start();

/**
 * Created by PhpStorm.
 * User: mehamasum
 * Date: 4/23/2017
 * Time: 8:07 PM
 */

$state = $_POST['state'];
$bus_id = $_POST['id'];
$user = $_SESSION['id'];

include_once ('dbconnect.php');

if($state==0) { // unfollowing
    $sql = "DELETE FROM `following` WHERE `user_id`= $user AND `bus_id`=$bus_id";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
else { // new following
    $sql = "INSERT INTO `following` (`user_id`, `bus_id`) VALUES ($user, $bus_id);";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}


