<?php
session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
?>


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

    <style>

        .star:before {
            content: ' \2605';
            font-size: 20px;
            color: coral;
        }

        hr {
            margin: 5px;
        }

        .circle-green:before {
            content: ' \25CF';
            font-size: 20px;
            color: forestgreen;
        }

        .circle-red:before {
            content: ' \25CF';
            font-size: 20px;
            color: indianred;
        }

        #map { margin-top:50px; position:absolute; top:0; bottom:0; width:100%; opacity: 0.8;}

        #data {
            padding: 10px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.8); transition: 0.3s;
            background-color: white;
            margin: 20px;
            position: absolute;
            bottom:0;
            right: 0;
            text-align:center;
        }

        @media all and (max-width:800px)
        {
            #data {
                padding: 10px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.8); transition: 0.3s;
                font-size: 0.9em;
                background-color: white;
                position: absolute;
                bottom:0;
                right: 0;
                text-align:center;
            }
        }

        .dropdown {
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php include("includes/static_top.php"); ?>

    <div id='map'></div>

    <div id="data">

        <div class="dropdown">
            <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                Name of the Bus
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
            </ul>
        </div>

        <div>
            <div>
                <span><strong>Shahbag, Dhaka</strong></span><span style="margin-left: 10px; color: grey">22 min ago</span>
                <br>
                <span>4:30 PM Up trip</span>
                <br>
                <span class="circle-green"></span><span>10</span> <span style="margin-left: 10px" class="circle-red"></span><span>10</span>
                <hr>

                <div>
                    <img src="img/default.png" alt="Avatar" style="width: 40px; height: 40px;float: left">
                    <div >
                        <span><strong>Meha Masum</strong></span><span style="margin-left: 5px; color: grey">CSE</span><br>
                        <span class="star"></span><span>10</span>
                    </div>

                    </div>

                </div>

            </div>

            <hr>
            <button class="btn btn-success">Upvote</button>
            <button class="btn btn-danger">Report</button>

        </div>

    </div>

    <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />

    <script>
        L.mapbox.accessToken = 'pk.eyJ1IjoibWVoYW1hc3VtIiwiYSI6ImNpdnhscWRvbzAyN2wyeXRhY2w1eGRvYngifQ.Cwlq3LDDRoBdsIZ_kQPHig';
        var map = L.mapbox.map('map', 'mapbox.streets')
                .setView([23.8103, 90.4125], 10).addControl(L.mapbox.geocoderControl('mapbox.places', {
                    autocomplete: true
                }));
    </script>

</body>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>