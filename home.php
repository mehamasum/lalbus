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
    <script src="js/home.js"></script>

    <style>

        .star:before {
            content: ' \2605';
            font-size: 15px;
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
            left: 0;
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
                left: 0;
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

        <select id="followingList" class="form-control" onchange="findMyBus(this.value, this.options[this.selectedIndex].innerHTML);">
        </select>

        <div id="resultDetails">
        </div>

    <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />


    <script>
        function initMap() {
            var dhaka = {lat: 23.7315, lng: 90.3925};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: dhaka
            });
        }


        // add data

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                console.log(this.responseText);
                var reply = JSON.parse(this.responseText);

                var idx;
                for (idx = 0; idx < reply.length; idx++) {
                    console.log(reply[idx]["bus_id"]);
                    var obj = "<option value='"+reply[idx]['id']+"'>"+reply[idx]['name']+"</option>";
                    console.log(obj);
                    $("#followingList").append(obj);
                }

                if(reply.length>0) {
                    findMyBus(reply[0]["id"], reply[0]['name']);
                }

            }
        };
        xhttp.open("POST", "backend/following_list_for_user.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+ <?php echo $_SESSION['id']; ?>);
    </script>



</body>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeH9FGEigaoT9FRddspqhiIe75TZLJ48&callback=initMap">
</script>
</html>