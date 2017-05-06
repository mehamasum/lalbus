<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 1:49 AM
 */
include_once("validator/admin_auth_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Validation | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">


</head>
<body onload="initialize()">
<?php include("includes/static_top.php"); ?>
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_authorization").className += "active";
</script>

<div class="container">

    <div>
        <span>
            <h3 style="width: 100%; text-align: center">Bus Route Update Requests</h3>
            <p style="width: 100%; text-align: center">Confirm suggested updates to Bus Routes</p>
        </span>
        <button class="btn btn-danger pull-right" onClick="window.location.reload()"> Refresh </button>
    </div>

    <br><br>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Suggestion Type</th>
            <th>Old Bus Name</th>
            <th>Bus Name</th>
            <th>Route</th>
            <th>Remarks</th>
            <th title="Update Suggested By this user">User</th>
            <th title="User Level">User Level</th>
            <th title="Positive Reputation">User Reputation</th>
            <th title="Time of update request">Suggested at</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="bus_body">
        </tbody>
    </table>


</div>

</body>

<!-- Bootstrap core JavaScript -->
<script src="js/bus_auth.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>
