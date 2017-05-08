<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/28/2017
 * Time: 10:43 AM
 */
include_once("validator/login_session_check.php");
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


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/schedule.css">
    <link rel="stylesheet" href="css/static_top.css">
</head>

<body class="login">
<?php include("includes/static_top.php"); ?>
<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<script>
    var id=<?php echo $_SESSION['id']?>;
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_user").className += "active";
</script>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <h3 class="form-title font-dark">Change your Password</h3>
        <br>
        <div class="form-group">
            <input type="password" name="oldpass" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Old Password" value="" minlength="5" required="">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="New Password" value="" minlength="5" required="">
        </div>

        <div class="form-group">
            <input type="password" name="newpass" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Confirm Password" value="" minlength="5" required="">
        </div>

        <div class="alert alert-success" id="success-alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Password has been updated successfully.
        </div>

        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button id="update" type="button" onclick="validatePassword()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>

</body>

<script src="js/update_password.js"></script>

<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>

</html>

