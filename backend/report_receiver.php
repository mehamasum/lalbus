<?php
/**
 * Created by PhpStorm.
 * User: mehamasum
 * Date: 4/24/2017
 * Time: 12:12 AM
 */
session_start();

include_once ('dbconnect.php');

$bus_id = mysqli_real_escape_string($conn,$_POST['b']);
$user = $_SESSION['id'];
$lat = mysqli_real_escape_string($conn,$_POST['lat']);
$lng = mysqli_real_escape_string($conn,$_POST['lng']);

// TODO: dynamically create reports table for new bus in dasboard

$test = "SELECT 1 FROM reports".$bus_id." LIMIT 1;";

if ($conn->query($test) == FALSE) {
    // gen table
    $create = "CREATE TABLE `lalbus_db`.`reports".$bus_id."` ( `id` INT NOT NULL AUTO_INCREMENT , `bus_id` INT NOT NULL , `user_id` INT NOT NULL , `lat` DOUBLE NOT NULL , `lng` DOUBLE NOT NULL , `time` DATETIME NOT NULL , `pos_cnt` INT NOT NULL , `neg_cnt` INT NOT NULL , PRIMARY KEY (`id`));";

    if ($conn->query($create) == TRUE) {
        $sql = "INSERT INTO reports".$bus_id." (`id`, `bus_id`, `user_id`, `lat`, `lng`, `time`, `pos_cnt`, `neg_cnt`) 
        VALUES (NULL, '$bus_id', '$user', '$lat', '$lng', NOW(), 0, 0);";
        if ($conn->query($sql) == TRUE) {
            echo "ONE";
        }
        else {
            echo "ERR";
        }
    }
    else {
        echo "ERR";
    }
}

else {
    $sql = "INSERT INTO reports".$bus_id." (`id`, `bus_id`, `user_id`, `lat`, `lng`, `time`, `pos_cnt`, `neg_cnt`) 
        VALUES (NULL, '$bus_id', '$user', '$lat', '$lng', NOW(), 0, 0);";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}



