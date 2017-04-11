<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Report | LalBus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">

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

<body class="login">

<div class="logo">
    <a href=""><img style="width: 20%;" src="./img/logo-w.png?res" alt="OverDrive"></a>
</div>

<div class="content">

    <div>
        <h3 class="form-title font-dark">Report</h3>

        <div class="form-actions">
            <button class="btn red btn-block" onclick="getLocation()">Report</button>
        </div>

        <div id="mapholder"></div>

        <script>
            var x = document.getElementById("demo");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                var latlon = position.coords.latitude + "," + position.coords.longitude;

                var map = document.getElementById("mapholder");
                console.log(map.style);

                var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
                    +latlon+"&zoom=14&size=400x300&sensor=false&key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU";
                document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
            }
            //To use this code on your website, get a free API key from Google.
            //Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        x.innerHTML = "User denied the request for Geolocation.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        x.innerHTML = "Location information is unavailable.";
                        break;
                    case error.TIMEOUT:
                        x.innerHTML = "The request to get user location timed out.";
                        break;
                    case error.UNKNOWN_ERROR:
                        x.innerHTML = "An unknown error occurred.";
                        break;
                }
            }
        </script>

    </div>

</div>

<div class="copyright">© 2016 Batfia</div>
</body>

</html>