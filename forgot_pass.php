<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 1:18 AM
 */
include_once("validator/guest_session_check.php") ?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forgot Password | LalBus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="css/screen.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">
    <style type="text/css">
        html {
            height: 100%;
        }

        .page-inner {
            display: table;
            width: 100%;
            font-family: 'Maven Pro';
        }
    </style>
</head>

<body class="login">
<?php include("includes/static_top.php"); ?>
<div class="logo">
    <a href=""><img src="img/logo-w.png?res" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <h3 class="form-title font-dark">Forgot Password</h3>
        <br>
        <p> Enter your registration number or email. We'll email instructions on how to reset your password</p>
        <br>
        <div class="form-group">
            <input type="number" name="reg_no" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="DU Reg No (2017812...)" value="" required="">
        </div>
        <br>
        <p> Or </p>
        <br>

        <div class="form-group">
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off"
                   placeholder="Email" name="email" required="">
        </div>
        <div class="alert alert-success" id="success-alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Password Reset Instructions sent to your email Successfully.
        </div>

        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions" align="right">
            <button type="button" class="btn red" onclick="validateRequest()">Submit</button>
        </div>

        <div class="create-account">
            <p>
                <a href="signup">Create an account</a>
            </p>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>
</body>

<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_user").className += "active";
</script>

<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script src="js/forgot_pass.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>