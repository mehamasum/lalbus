<?php
session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login.php');
    ob_end_flush();
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8TAiLd5IswFDLPKwv7vR_y5rrGbpe71U&libraries=places,geometry"></script>
    <script src="js/places.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/static_top.css">
</head>
<body onload="initialize()">
<?php include("includes/static_top.php"); ?>
<div id="locationField">
    <input id="autocomplete" placeholder="Enter your address" type="text"></input>
</div>
<div id="buslist">
</div>
</body>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>