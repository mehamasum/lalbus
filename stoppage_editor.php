<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/6/2017
 * Time: 3:59 AM
 */

 include_once("validator/login_session_check.php") ?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Update Stoppage | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
</head>


<body class="login" onload="initialize()">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <div id="submit_header">
            <h3 class="form-title font-dark">Update Stoppage</h3>
        </div>

        <br>

        <div class="form-group">
            <select name="update_type" class="form-control form-control-solid placeholder-no-fix">
                <option value="0" >Add</option>
                <option value="1" >Update</option>
                <option value="2" >Delete</option>
            </select>
        </div>


        <div class="form-group">
            <select name="bus" class="form-control form-control-solid placeholder-no-fix">
            </select>
        </div>

        <div class="form-group">
            <input id="autocomplete" placeholder="Bus Stoppage Name" type="text"  class="form-control form-control-solid placeholder-no-fix"></input>
        </div>

        <div class="form-group">
            <div>
                <input type="text" name="latitude" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Latitude" value="" required="" readonly>
            </div>

        </div>
        <div class="form-group">
            <div>
                <input type="text" name="longitude" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Longitude" value="" required="" readonly>
            </div>

        </div>

        <div class="form-group">
            <select name="stoppage_type" class="form-control form-control-solid placeholder-no-fix">
                <option value="0" >Up Trip</option>
                <option value="1" >Down Trip</option>
                <option value="2" >Both Trip</option>
            </select>
        </div>

        <div class="form-group">
            <div>
                <input type="text" name="remarks" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Special Mention about this stoppage" value="" required="">
            </div>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8TAiLd5IswFDLPKwv7vR_y5rrGbpe71U&libraries=places,geometry"></script>
<script src="js/stoppage_editor.js"></script>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery-3.1.1.min.js"></script>
</html>