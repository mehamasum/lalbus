<?php
session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}

/*
 * Move the javascripts of this file to separate file
 *
 */
?>


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
    <link rel="stylesheet" href="css/report_overlay.css">
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

<?php include("includes/static_top.php"); ?>

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

    </div>


    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="locationField" align="center"  style="width: 100%;padding-top: 10px">
                <label for="autocomplete">Location of the bus:</label>
                <input id="autocomplete" align="center" placeholder="Enter your address" type="text" style="width: 60%; height: 3em"></input>
            </div>


            <div id="placesholder"></div>

            <div class="form-actions">
                <button class="btn red btn-block" onclick="setPlaces()">Report</button>
            </div>

        </div>

    </div>
</div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8TAiLd5IswFDLPKwv7vR_y5rrGbpe71U&libraries=places,geometry"></script>
<script src="js/report_overlay.js"></script>
</html>