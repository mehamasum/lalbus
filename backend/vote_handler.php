<?php
session_start();
/**
 * Created by PhpStorm.
 * User: mehamasum
 * Date: 4/28/2017
 * Time: 6:44 PM
 */

include_once ('dbconnect.php');

$bus_id = $_POST['b'];
$reportId = $_POST['r'];
$type = $_POST['type'];


$pos_sql = "UPDATE `reports".$bus_id."` SET `pos_cnt` = `pos_cnt`+ 1 WHERE `reports".$bus_id."`.`id` = '$reportId';";
$pos_updater = "UPDATE `users` SET `pos_repu`= `pos_repu`+1 WHERE `users`.`id` = (SELECT `user_id` FROM `reports".$bus_id."` WHERE `id` = '$reportId')";

$neg_sql = "UPDATE `reports".$bus_id."` SET `neg_cnt` = `neg_cnt`+ 1 WHERE `reports".$bus_id."`.`id` = '$reportId';";
$neg_updater = "UPDATE `users` SET `neg_repu`= `neg_repu`+1 WHERE `users`.`id` = (SELECT `user_id` FROM `reports".$bus_id."` WHERE `id` = '$reportId')";

$vote_saver = "INSERT INTO `votes` (`user_id`, `bus_id`, `report_id`) VALUES ( '".$_SESSION['id']."', '".$bus_id."', '".$reportId."')";

//echo $vote_saver;

if($type=="POS") {
    if ($conn->query($pos_sql) == TRUE && $conn->query($pos_updater) == TRUE && $conn->query($vote_saver) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
else {
    if ($conn->query($neg_sql) == TRUE && $conn->query($neg_updater) == TRUE && $conn->query($vote_saver) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}

