<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/6/2017
 * Time: 3:52 PM
 *
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

/*
Transfer from Places_request to Places
*/
$state = mysqli_real_escape_string($conn,$_POST['state']);
$stoppage = mysqli_real_escape_string($conn,$_POST['id']);
$update_mode=mysqli_real_escape_string($conn,$_POST['mode']);
$error=false;
if($state==0) { // Rejected

    $sql = "DELETE from `places_request` WHERE id=$stoppage;";
    echo $sql;
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
    $sql = "select * from places_request WHERE id=$stoppage";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $repu=$row["pos_repu"];
    $updater=$row["user_id"];

    /* Update Stoppage Database */
    if($update_mode==0)//update
    {
        //id	update_type	stoppage_name	lat	lng	bus_id	stoppage_type	remarks	user_id	requested_on
        $sql="UPDATE places SET stoppage_name='$row[stoppage_name]',lat='$row[lat]',lng='$row[lng]',bus_id=$row[bus_id],stoppage_type=$row[stoppage_type],remarks='$row[remarks]'  WHERE  stoppage_name='$row[stoppage_name]';";
    }
    else if ($update_mode==1)
    {
        $sql="INSERT INTO `places` (`id`, `stoppage_name`, `lat`, `lng`, `bus_id`, `stoppage_type`, `remarks`) VALUES (NULL, '$row[stoppage_name]', '$row[lat]', '$row[lng]', '$row[bus_id]', '$row[stoppage_type]', '$row[remarks]');";
    }
    else if($update_mode==2)
    {
        $sql="DELETE FROM places WHERE id=$old_schedule";
    }


    // echo $sql;
    if ($conn->query($sql) == TRUE) {
        //Stoppage Database Updated
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

    $sql = "DELETE from `places_request` WHERE id=$stoppage;";
    if ($conn->query($sql) == TRUE) {
        //Stoppage Cleared
        echo "ONE";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

}

?>
