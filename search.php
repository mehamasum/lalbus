<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Bus | Lalbas</title>
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
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_stoppage").className += "active";
</script>
<div id="locationField" align="center"  style="width: 100%;padding-top: 10px">
    <label for="autocomplete">Address:</label>
    <input id="autocomplete" align="center" placeholder="Enter your address" type="text" style="width: 60%; height: 3em"></input>
</div>

<div class="container" style="width: 100%; text-align: center">
    <h3>Search Bus by Stoppage</h3>
    <p>Search Buses which go near your address</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nearest Stoppage</th>
            <th>Bus Name</th>
            <th>Distance(km) </th>
        </tr>
        </thead>
        <tbody id="buslist">
        </tbody>
    </table>
</div>
</div>
</body>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8TAiLd5IswFDLPKwv7vR_y5rrGbpe71U&libraries=places,geometry"></script>
<script src="js/search.js"></script>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>