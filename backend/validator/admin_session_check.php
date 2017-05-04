<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/4/2017
 * Time: 8:46 PM
 */

session_start();
include_once(dirname(__FILE__)."/../dbconnect.php");
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
else
{
    $user = $_SESSION['id'];
    $sql = "select * from users WHERE id=$user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $level=$row['level'];
    if($level<2)
    {
        ob_start();
        header('Location: home');
        ob_end_flush();
        die();
    }
}
?>