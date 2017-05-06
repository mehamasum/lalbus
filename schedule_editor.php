<?php include_once("validator/login_session_check.php") ?>
<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 1:11 PM
 */

$schedule_id=$_GET['id'];
$mode=$_GET['m'];
$bus_id=$_GET['b'];
?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Update Schedule | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
</head>

<script >
    var schedule_id=<?php echo $schedule_id?>;
    var mode=<?php echo $mode?>;
    var bus_id=<?php echo $bus_id?>;
</script>

<body class="login">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <div id="submit_header">
            <h3 class="form-title font-dark">Update Schedule</h3>
        </div>

        <br>

        <div class="form-group">
            <select name="bus_name" class="form-control form-control-solid placeholder-no-fix">
            </select>
        </div>

        <div class="form-group">
            <input type="text" name="time" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Trip Time" value="" minlength="3" maxlength="10" required="">
        </div>

        <div class="form-group">
            <select name="trip_type" class="form-control form-control-solid placeholder-no-fix">
                <option value="0" >Up Trip</option>
                <option value="1" >Down Trip</option>
            </select>
        </div>

        <div class="form-group">
            <div>
                <input type="text" name="endpoint" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Start/ Destination of the Bus" value="" required="">
            </div>

        </div>

        <div class="form-group">
            <div>
                <input type="text" name="driver" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Name or Number of the Driver" value="" required="">
            </div>

        </div>
        <div class="form-group">
            <div>
                <input type="text" name="notes" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Special Mentions about this trip" value="" required="">
            </div>

        </div>

        <div class="form-group">
            <input type="text" name="bus_no" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Bus Number" value="" required="">
        </div>

        <div class="alert alert-success" id="success-alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Your suggestion for bus schedule has been accepted.
        </div>


        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button"  id="submit_btn" onclick="validateScheduleEdit()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>

</body>
<script src="js/schedule_editor.js"></script>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script>
    setValue();
</script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

