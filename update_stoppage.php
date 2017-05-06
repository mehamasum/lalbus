<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/6/2017
 * Time: 5:37 PM
 */

 include_once("validator/login_session_check.php");
$schedule_id=$_GET['id'];
?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Update Stoppage| Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
</head>

<script >
    var schedule_id=<?php echo $schedule_id?>;
</script>

<body class="login">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <div id="submit_header">
            <h3 class="form-title font-dark">Update Stoppage</h3>
        </div>

        <div style="text-align: center">
            <h2 id="bus_header" class="form-title font-dark"></h2>
        </div>
        <br>

        <div class="form-group">
            <div>
                <input type="text" name="stoppage_name" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Stoppage Name" value="" required="" readonly>
            </div>
        </div>


        <div class="form-group">
            <div>
                <input type="text" name="lat" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Latitude" value="" required="" readonly style="display: none">
            </div>
        </div>


        <div class="form-group">
            <div>
                <input type="text" name="lng" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Longitude" value="" required="" readonly style="display: none">
            </div>
        </div>


        <div class="form-group">
            <div>
                <input type="text" name="bus" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Bus ID" value="" required="" readonly style="display: none">
            </div>
        </div>


        <div class="form-group">
            <select name="stoppage_type" class="form-control form-control-solid placeholder-no-fix">
                <option value="0" >Up Trip Only</option>
                <option value="1" >Down Trip Only</option>
                <option value="2" >Both Trips</option>
            </select>
        </div>

        <div class="form-group">
            <div>
                <input type="text" name="remarks" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Remarks" value="" required="">
            </div>
        </div>


        <div class="alert alert-success" id="success-alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Your suggestion for bus stoppage update has been accepted.
        </div>


        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button"  id="submit_btn" onclick="validateStoppageEdit()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>

</body>
<script src="js/update_stoppage.js"></script>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script>
    initialize();
</script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

