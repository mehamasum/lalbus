<?php

include_once ('dbconnect.php');

$bus_id = $_POST['busId'];

$sql = "SELECT `reports".$bus_id."`.id as reportId, lat, lng, time, pos_cnt, neg_cnt, name as user, pos_repu FROM `reports".$bus_id."`,`users` WHERE user_id= `users`.id ORDER BY `reports".$bus_id."`.id DESC LIMIT 1";

//echo $sql;

$test = "SELECT 1 FROM reports".$bus_id." LIMIT 1;";

if ($conn->query($test) == FALSE) {
    // gen table
    $create = "CREATE TABLE `lalbus_db`.`reports".$bus_id."` ( `id` INT NOT NULL AUTO_INCREMENT , `bus_id` INT NOT NULL , `user_id` INT NOT NULL , `lat` DOUBLE NOT NULL , `lng` DOUBLE NOT NULL , `time` DATETIME NOT NULL , `pos_cnt` INT NOT NULL , `neg_cnt` INT NOT NULL , PRIMARY KEY (`id`));";

    if ($conn->query($create) == TRUE) {
        get($conn, $sql);
    }
    else {
        echo "ERR CRT";
    }
}

else {
    get($conn, $sql);
}

function get($con, $q) {
    $result = $con->query($q);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo json_encode($row)."\n";
    }
    else {
        echo "EMPTY";
    }
}
