<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 12:33 AM
 */
include_once("validator/login_session_check.php") ;

$bus_id=$_GET['id'];
$mode=$_GET['m'];
$route=$_GET['r'];
$name=$_GET['name'];
?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Update Bus Route | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
</head>

<script >
    var bus_id=<?php echo $bus_id?>;
    var mode=<?php echo $mode?>;
    var route='<?php echo $route?>';
    var bus_name='<?php echo $name?>';
</script>

<body class="login">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <div id="submit_header">
            <h3 class="form-title font-dark">Update Bus Route</h3>
        </div>

        <br>

        <div class="form-group">
            <input type="text" name="bus_name" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Bus Name" value="" minlength="3" required="">
        </div>

        <div class="form-group">
            <input type="text" name="route" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Last Stop" value="" minlength="3" required="">
        </div>


        <div class="form-group">
            <input type="text" name="remarks" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Remarks" value="" minlength="3"  required="">
        </div>


        <div class="alert alert-success" id="success-alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Your suggestion for bus route has been accepted.
        </div>


        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button"  id="submit_btn" onclick="validateBusEdit()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>

</body>
<script src="js/bus_editor.js"></script>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script>
    initialize();
</script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

