<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/30/2017
 * Time: 2:31 AM
 */
require_once('backend/dbconnect.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
// Verify data
    $email = mysqli_real_escape_string($conn,$_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($conn,$_GET['hash']); // Set hash variable

    $search = $conn->query("SELECT email, code, status FROM users WHERE email='".$email."' AND code='".$hash."' AND status='1'") or die(mysqli_error($conn));
    $match  = $search->num_rows;

    if($match > 0){
        // We have a match, activate the account
        $conn->query("UPDATE users SET status='2' WHERE email='".$email."' AND code='".$hash."' AND status='1'") or die(mysqli_error($conn));
        echo '<div class="statusmsg">Your account has been activated, you can now login.<br>

If your browser doesn\'t automatically redirect you to the homepage within a few seconds,
you may want to go to <a href="http://csedu.cf/lalbus/home">the home page</a>
manually.</div>';
    }
    else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you have already activated your account.</div>';
    }
}
else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been sent to your email.</div>';
}

?>