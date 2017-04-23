<?php
session_start();
if(isset($_SESSION['id']))
{
    ob_start();
    header('Location: home.php');
    ob_end_flush();
    die();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Home | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/static_top.css">
    <link rel="stylesheet" href="css/screen.css">


</head>

<body class="login">


    <?php include("includes/static_top.php"); ?>

    <div class="content">

        <form class="login-form" action="#" method="POST">
            <h3 class="form-title font-dark">Where is my...</h3>
            <div class="form-group">
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Type bus name here" name="handle"
                       required="">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn red btn-block">Find</button>
            </div>

            <div class="create-account">
                <p>
                    <a href="#">Report Location</a>
                </p>
            </div>
        </form>

    </div>

    <div class="copyright">© 2016 Batfia</div>

</body>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

</html>