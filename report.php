<?php include_once("includes/login_session_check.php") ?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Report | LalBus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/static_top.css">
    <script src="js/bus_list.js"></script>
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
<body onload="bus_initialize('bus')">
<?php include("includes/static_top.php"); ?>
<script src="js/report.js"></script>
<div class="content">

    <div>
        <h3 class="form-title font-dark">Report</h3>


        <div class="form-group">
            <select name="bus" class="form-control form-control-solid placeholder-no-fix">
            </select>
        </div>

        <div class="form-actions">
            <button class="btn red btn-block" onclick="getLocation()">Use GPS to Report</button>
        </div>

        <div id="mapholder"></div>

    </div>

</div>
</body>

</html>