<?php
session_start();
include_once ('dbconnect.php');

$bus_id = mysqli_real_escape_string($conn, $_POST['busId']);

$sql = "SELECT `reports".$bus_id."`.id as reportId, lat, lng, time, pos_cnt, neg_cnt, name as user, pos_repu FROM `reports".$bus_id."`,`users` WHERE user_id= `users`.id ORDER BY `reports".$bus_id."`.id DESC LIMIT 1";

//echo $sql;

$test = "SELECT 1 FROM reports".$bus_id." LIMIT 1;";

if ($conn->query($test) == FALSE) {
    // gen table
    $create = "CREATE TABLE `lalbus_db`.`reports".$bus_id."` ( `id` INT NOT NULL AUTO_INCREMENT , `bus_id` INT NOT NULL , `user_id` INT NOT NULL , `lat` DOUBLE NOT NULL , `lng` DOUBLE NOT NULL , `time` DATETIME NOT NULL , `pos_cnt` INT NOT NULL , `neg_cnt` INT NOT NULL , PRIMARY KEY (`id`));";

    if ($conn->query($create) == TRUE) {
        get($conn, $bus_id);
    }
    else {
        echo "ERR CRT";
    }
}

else {
    get($conn, $bus_id);
}

function get($con, $bus_id) {


    $sql1 = "SELECT * FROM `reports".$bus_id."` ORDER BY id DESC LIMIT 1;";
    $sql2 = "SELECT name, pos_repu from users where id = (SELECT user_id FROM `reports".$bus_id."` ORDER BY id DESC LIMIT 1);";


    $result1 = $con->query($sql1);
    $result2 = $con->query($sql2);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $row2 = $result2->fetch_assoc();

        $sql3 = "SELECT * FROM `votes` WHERE `user_id`= " . $_SESSION["id"]." AND `bus_id`=".$bus_id. " AND `report_id`=". $row1['id'];

        //echo $sql3;

        $bool = "false";
        $result3 = $con->query($sql3);
        if($result3->num_rows > 0) $bool="true";


        $row = ["reportId"=> $row1['id'], "lat"=>$row1['lat'], "lng"=>$row1['lng'], "time"=>$row1['time'],
            "pos_cnt"=>$row1['pos_cnt'], "neg_cnt"=>$row1['neg_cnt'], "user"=>$row2['name'], "pos_repu"=>$row2['pos_repu'], "voted"=>$bool ];

        echo json_encode($row)."\n";
    }
    else {
        echo "EMPTY";
    }
}
