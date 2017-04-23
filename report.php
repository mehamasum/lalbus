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
    <a href=""><img src="./img/logo-w.png?res" alt="Lalbus"></a>
</div>

<div class="content">

    <div>
        <h3 class="form-title font-dark">Report</h3>


        <div class="form-group">
            <select name="bus" class="form-control form-control-solid placeholder-no-fix">
                <?php
                require_once('backend/dbconnect.php');
                // already in ?
                $sql = "SELECT * FROM bus";
                $result = $conn->query($sql);

                $total = $result->num_rows;

                for($i=0; $i<$total; $i++) {
                    $row = $result->fetch_assoc();

                    $id = $row["id"];
                    $name = $row["name"];

                    echo "<option value=$id>$name</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-actions">
            <button class="btn red btn-block" onclick="getLocation()">Use GPS to Report</button>
        </div>

        <div id="mapholder"></div>

        <script>
            var x = document.getElementById("mapholder");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {

                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var latlon = "Latitude: "+position.coords.latitude + "<br>"+ "Longitude"+ position.coords.longitude +"<br>";

                var map = document.getElementById("mapholder");
                map.innerHTML = latlon;

                var bus = document.getElementsByName("bus")[0].value;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //this.responseText;
                        var reply = this.responseText;

                        console.log(reply);

                        if (reply.indexOf("ONE") != -1) {
                            window.location.href = "home.php";
                        }
                        else {
                            map.innerHTML += "Something went wrong" + "<br>";
                        }

                    }
                };
                xhttp.open("POST", "backend/report_receiver.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("u=<?php echo $_SESSION['id'];?>&b="+bus+"&lat="+lat+"&lng="+lng);

            }

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