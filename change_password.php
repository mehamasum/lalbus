<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/28/2017
 * Time: 10:43 AM
 */


session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}

include_once ('backend/dbconnect.php');
$userid=$_SESSION['id'];
?>


<!DOCTYPE html>

<html>

<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Change Password | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
    <link rel="stylesheet" href="./css/profile.css">
    <script>
        var id=<?php echo $userid ?>;
    </script>
</head>

<body class="login">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <h3 class="form-title font-dark">Change your Password</h3>
        <br>
        <div class="form-group">
            <input type="password" name="oldpass" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Password" value="" minlength="8" required="">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Password" value="" minlength="8" required="">
        </div>

        <div class="form-group">
            <input type="password" name="newpass" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Password" value="" minlength="8" required="">
        </div>


        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button" onclick="validatePassword()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>


</body>
<script src="js/change_password.js"></script>
<script src="js/main.js"></script>
</html>

