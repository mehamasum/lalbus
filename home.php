<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/static_top.css">

    <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
    <style>
        #map { margin-top:50px; position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>
    <?php include("includes/static_top.html"); ?>
    <div id='map'></div>
    <script>
        L.mapbox.accessToken = 'pk.eyJ1IjoibWVoYW1hc3VtIiwiYSI6ImNpdnhscWRvbzAyN2wyeXRhY2w1eGRvYngifQ.Cwlq3LDDRoBdsIZ_kQPHig';
        var map = L.mapbox.map('map', 'mapbox.streets')
                .setView([23.8103, 90.4125], 13).addControl(L.mapbox.geocoderControl('mapbox.places', {
                    autocomplete: true
                }));
    </script>
</body>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>