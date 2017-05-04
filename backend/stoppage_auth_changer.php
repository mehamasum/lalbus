<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/5/2017
 * Time: 1:37 AM
 *
 * TODO : Finish it, Currently same as Member auth
 */

session_start();
include_once ('dbconnect.php');
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
else
{
    $suser = $_SESSION['id'];
    $sql = "select * from users WHERE id=$suser";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $level=$row['level'];
    if($level<2)
    {
        echo "ERR";
        die();
    }
}


$state = $_POST['state'];
$user = $_POST['id'];

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


?>