<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 2:05 AM
 */

// no injection
require_once('dbconnect.php');

$newpass= mysqli_real_escape_string($conn,$_POST['p']);
$email=mysqli_real_escape_string($conn,$_POST['e']);

$sql = "SELECT * FROM users WHERE email='$email'";

//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "ZERO";
}
else
{
    $cost = 10;

    // Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    // Prefix information about the hash so PHP knows how to verify it later.
    // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

    $hash = crypt($newpass, $salt);

    $sql="UPDATE users SET password='$hash' where email='$email';";

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