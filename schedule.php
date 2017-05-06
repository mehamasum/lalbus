
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
        <link rel="stylesheet" href="css/bus_modal.css">

        <style>
            .btn {border-radius: 0;}
        </style>

    </head>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/schedule.js"></script>
    <body onload="init_bus()">
    <?php include("includes/static_top.php");?>
    <script>
        document.getElementById("page_home").classList.remove("active");
        document.getElementById("page_schedule").className += "active";
    </script>

    <div class="container" style="width: 100%; text-align: center">
        <h3>View Bus Schedule</h3>
        <p>Get the schedule of your bus</p>

        <div class="btn-group" style="float: right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Change Bus <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" id="bus_list">
            </ul>
        </div>

<!--
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="btn btn-primary pull-right" data-parent="#accordion" data-toggle="collapse" href="#collapse1"> Change Bus</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <ul class="list-group" class="btn-group-justified" style=" margin-right: auto; margin-left: auto; width: 100%;" id="bus_list">
            </ul>
        </div>-->

    </div>
    <div id="container_table">
        <div id="up">
            <h4 id="bus_name_up"></h4>
        <table class="table table-striped col-md-12 sortable" >
            <thead>
            <tr>
                <th>Time</th>
                <th>Start</th>
                <th>Driver</th>
                <th>Bus Number</th>
                <th>Remarks</th>
            </tr>
            </thead>
            <tbody id="up_table">
            </tbody>
        </table>
        </div>

        <div id="down">
            <h4 id="bus_name_down"></h4>
        <table class="table table-striped col-md-12 sortable" >
            <thead>
            <tr>
                <th>Time</th>
                <th>Endpoint</th>
                <th>Driver</th>
                <th>Bus Number</th>
                <th>Remarks</th>
                <th id="down_comment"></th>
            </tr>
            </thead>
            <tbody id="down_table">
            </tbody>
        </table>
        </div>
    </div>

    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Select a bus to Update Schedule</h3>
            <div class="btn-group-vertical" style=" margin-right: auto; margin-left: auto; width: 100%;" name="list_bus">
            </div>

        </div>

    </div>


    </body>
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.min.js"></script>
</html>