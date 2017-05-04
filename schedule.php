
<!doctype html>
    <html lang="en">


    <head>
      <meta charset="UTF-8">
      <title>Schedule | Lalbus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="./img/favicon.png">
        <link rel="canonical" href="">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/schedule.css">
        <link rel="stylesheet" href="css/static_top.css">

        <style>
            .btn {border-radius: 0;}
        </style>

    </head>
    <body onload="bus_list()">
    <?php include("includes/static_top.php");?>
    <script>
        var activeButton='btn_1';
        document.getElementById("page_home").classList.remove("active");
        document.getElementById("page_schedule").className += "active";
    </script>

    <div class="container" style="width: 100%; text-align: center">
        <h3>View Bus Schedule</h3>
        <p>Get the schedule of your bus</p>
    </div>
    <div id="container_table">
        <div id="first" style="text-align: center">
            <p><b>Select Bus:</b></p>
            <div class="btn-group-vertical" id="bus">
                <button type="button" class="btn btn-primary">Apple</button>
            </div>
        </div>

        <div id="second" >
            <div id="received_table" class="table-responsive"></div>
        </div>
    </div>

</body>
    <script src="js/schedule.js"></script>
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
</html>