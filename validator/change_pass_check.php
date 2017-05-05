<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/6/2017
 * Time: 2:11 AM
 */

require_once('backend/dbconnect.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
// Verify data
    $email = mysqli_real_escape_string($conn,$_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($conn,$_GET['hash']); // Set hash variable

    $search = $conn->query("SELECT email, code, status FROM users WHERE email='".$email."' AND code='".$hash."'") or die(mysqli_error($conn));
    $match  = $search->num_rows;

    if($match == 0){
        ob_start();
        header('Location: login');
        ob_end_flush();
        die();
    }
    else
    {
        //do nothing
    }
}
else{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
