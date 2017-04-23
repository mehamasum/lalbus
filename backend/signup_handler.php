<?php
session_start();

//  xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm);

$name = $_POST['n'];
$reg_no = $_POST['r'];
$mob_no = $_POST['m'];
$password = $_POST['p'];
$comm =  $_POST['c'];
$bus_id = $_POST['b'];

// check for sql injection


$comm = intval($comm);
//echo $comm;

// no injection
require_once('dbconnect.php');
// already in ?
$sql = "SELECT * FROM users WHERE reg_no='$reg_no' OR mob_no='$mob_no'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "ZERO";
}
else {
    // insert in db

    $cost = 10;

    // Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    // Prefix information about the hash so PHP knows how to verify it later.
    // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

    // Hash the password with the salt
    $hash = crypt($password, $salt);


    $six_digit_random_number = mt_rand(100000, 999999);


    $sql = "INSERT INTO users (name, reg_no, mob_no, password, bus_id, level_req, status, code) ".
        "VALUES ('" .  $name . "','" . $reg_no . "','". $mob_no . "','" . $hash . "', " . $bus_id . "," . $comm . ", ". 1 .",". $six_digit_random_number. ");";
    //echo $sql;


    if ($conn->query($sql) == TRUE) {

        $follow = "INSERT INTO following (user_id, bus_id)".
            "VALUES ($conn->insert_id, $bus_id)";

        $conn->query($follow);

        $_SESSION['id']=$conn->insert_id;
        $_SESSION['name']=$name;
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
mysqli_close($conn);
