<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/7/2017
 * Time: 12:18 AM
 */

include_once("validator/schedule_auth_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Edit | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">
    <script src="js/sorttable.js"></script>
</head>
<body onload="initialize()">
<?php include("includes/static_top.php"); ?>
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_edit").className += "active";
</script>
<div class="container" >
    <div>
        <div>
            <h3 style="width: 100%; text-align: center">Update Bus Route</h3>
            <p style="width: 100%; text-align: center">Add or Update Bus Routes</p>
        </div>
        <div>
            <button class="btn btn-danger pull-right" onClick="addBus()"> Add New Route </button>
        </div>
    </div>


    <table class="table table-striped col-md-12 sortable" >
        <thead>
        <tr>
            <th>Bus Name</th>
            <th>Route</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
    </table>
</div>

</body>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/edit_bus.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>