<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/30/2017
 * Time: 3:50 AM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Report | LalBus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/favicon.png">
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="../css/modal.css">
</head>
<body onload="initialize()">

<button id="myBtn">Open Modal</button>

<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="locationField" align="center"  style="width: 100%;padding-top: 10px">
            <label for="autocomplete">Location of the bus:</label>
            <input id="autocomplete" align="center" placeholder="Enter your address" type="text" style="width: 60%; height: 3em"></input>
        </div>

    </div>

</div>

</body>
<script src="overlay_test.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8TAiLd5IswFDLPKwv7vR_y5rrGbpe71U&libraries=places,geometry"></script>
</html>