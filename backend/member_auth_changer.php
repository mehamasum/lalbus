<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/25/2017
 * Time: 12:58 AM
 */

session_start();

$state = $_POST['state'];
$user = $_POST['id'];

include_once ('dbconnect.php');

if($state==0) { // Rejected
    $sql = "UPDATE users SET `level`=0 WHERE id=$user;";
    echo $sql;
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
else { // new following
    $sql = "UPDATE users SET `level`=1 WHERE id=$user;";
    echo $sql;
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}


