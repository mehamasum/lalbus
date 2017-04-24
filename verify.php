<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Lalbus > Sign up</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!-- start header div -->
<div id="header">
    <h3>Lalbus> Sign up</h3>
</div>
<!-- end header div -->

<!-- start wrap div -->
<div id="wrap">


</div>
<!-- end wrap div -->
</body>
</html>

<?php
require_once('backend/dbconnect.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_real_escape_string($conn,$_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($conn,$_GET['hash']); // Set hash variable

    $search = $conn->query("SELECT email, code, status FROM users WHERE email='".$email."' AND code='".$hash."' AND status='1'") or die(mysqli_error($conn));
    $match  = $search->num_rows;

    if($match > 0){
        // We have a match, activate the account
        $conn->query("UPDATE users SET status='2' WHERE email='".$email."' AND code='".$hash."' AND status='1'") or die(mysqli_error($conn));
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }

}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
?>