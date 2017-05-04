<?php include_once("validator/login_session_check.php") ?>

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
    <link rel="stylesheet" href="css/home.css">
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
        var id=<?php echo $_SESSION['id'];?>;
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
        xhttp.send("id="+ id);
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