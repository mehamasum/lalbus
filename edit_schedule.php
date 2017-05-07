<?php include_once("validator/edit_auth_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Edit | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">
    <script src="js/sorttable.js"></script>
    <link rel="stylesheet" href="css/bus_modal.css">
</head>
<body onload="initModal()">
<?php include("includes/static_top.php"); ?>
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_edit").className += "active";
</script>
<div class="container" >
   <div>
       <div>
           <h3 style="width: 100%; text-align: center">Update Bus Schedules</h3>
           <p style="width: 100%; text-align: center">Update the schedule of your bus</p>
           <p style="width: 100%; text-align: center">If the Admin Accepts your update, you get 10 reputation points</p>
           <p style="width: 100%; text-align: center">If the Admin Rejects your update, you will lose 2 reputation points</p>
       </div>
       <div>
           <button class="btn btn-primary pull-left" onClick="initModal()"> Change Bus </button>
           <button class="btn btn-danger pull-right" onClick="addTrip(bid)"> Add New Trip </button>
       </div>
   </div>


    <table class="table table-striped col-md-12 sortable" >
        <thead>
        <tr>
            <th>Bus Name</th>
            <th>Trip Type</th>
            <th>Time</th>
            <th>Endpoint</th>
            <th>Driver</th>
            <th>Bus Number</th>
            <th>Comment</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
    </table>
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
<script src="js/edit_schedule.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>