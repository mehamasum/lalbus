<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/28/2017
 * Time: 11:01 AM
 */
session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
$userid=$_SESSION['id'];
//  xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm);

// no injection
require_once('dbconnect.php');

$uid =mysqli_real_escape_string($conn, $_POST['id']);
$newpass= mysqli_real_escape_string($conn,$_POST['p']);
$oldpass=mysqli_real_escape_string($conn,$_POST['op']);
if($uid!=$userid)
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
$sql = "SELECT * FROM users WHERE id=$uid";
$result = $conn->query($sql);
$row= $result->fetch_row();
$pass=$row['password'];
if ($result->num_rows == 0) {
    echo "ZERO";
}
else
{

    // Hash the password with the salt

    if (hash_equals($pass, crypt($oldpass, $pass))==false)
    {
        echo "WRONG";
        die();
    }
    $cost = 10;

    // Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    // Prefix information about the hash so PHP knows how to verify it later.
    // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

    $hash = crypt($newpass, $salt);

    $sql="UPDATE users SET password='$hash' where id=$uid;";

    //echo $sql;

    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
mysqli_close($conn);

?>