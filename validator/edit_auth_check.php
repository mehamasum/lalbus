<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/4/2017
 * Time: 9:12 PM
 */

session_start();
include_once(dirname(__FILE__) . "/../backend/dbconnect.php");
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
    $bus=$row['bus_id'];

    $neg_repu=$row['neg_repu'];
    if($neg_repu>10)
    {
        echo "UNAUTHORIZED";
        die();
    }

   /* if($level==0)
    {
        ob_start();
        header('Location: home');
        ob_end_flush();
        die();
    }*/
}
?>
