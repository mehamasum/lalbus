<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/25/2017
 * Time: 12:58 AM
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


$state = mysqli_real_escape_string($conn, $_POST['state']);
$user = mysqli_real_escape_string($conn, $_POST['id']);

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


