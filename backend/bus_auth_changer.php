<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 1:49 AM
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

$state = mysqli_real_escape_string($conn,$_POST['state']);
$bus = mysqli_real_escape_string($conn,$_POST['id']);
$update_mode=mysqli_real_escape_string($conn,$_POST['mode']);
$old_bus=mysqli_real_escape_string($conn,$_POST['ref']);
$error=false;
if($state==0) { // Rejected

    $sql = "DELETE from `bus_request` WHERE id=$bus;";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        $error=true;
        echo "ERR";
    }
}

//Bus	Trip Type	Time	Endpoint	Driver	Bus Number	Comment	User	User Reputation	Suggested at

else { // Accepted



    $sql = "select * from bus_request WHERE id=$bus";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $updater=$row["user_id"];

    $name=mysqli_real_escape_string($conn,$row['name']);
    $route=mysqli_real_escape_string($conn,$row['route']);

    /* Update bus Database */
    if($update_mode==0)//update
    {
        $sql="UPDATE bus SET name='$name',route='$route' WHERE  id=$old_bus;";

    }
    else if ($update_mode==1)
    {
        $sql="INSERT INTO `bus` (`id`, `name`, `route`) VALUES (NULL, '$name','$route');";
    }
    else if($update_mode==2)
    {
        $sql="DELETE FROM `bus` WHERE id=$old_bus";
    }


    if ($conn->query($sql) == TRUE) {
        //bus Database Updated
        echo "THREE";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

    /*Increase Reputation for user */
    $sql="SELECT * from users WHERE id=$updater";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $repu=$row["pos_repu"];
    $repu=$repu+10;
    $sql="UPDATE users SET pos_repu=$repu WHERE id=$updater;";
    if ($conn->query($sql) == TRUE) {
        //User Reputation Updated
        echo "TWO";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

    /* Clear Request from database */
    $sql = "DELETE from `bus_request` WHERE id=$bus;";
    if ($conn->query($sql) == TRUE) {
        //bus Cleared
        echo "ONE";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

}

?>
