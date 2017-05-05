<?php include_once("validator/schedule_auth_check.php"); ?>

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
</head>
<body>
<?php include("includes/static_top.php"); ?>
<script>
    var sid=<?php echo $user ?>;
    var bid=<?php echo $bus ?>;
    console.log(bid);
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_admin_schedule").className += "active";
</script>
<div class="container" >
   <div>
       <div>
           <h3 style="width: 100%; text-align: center">Update Bus Schedules</h3>
           <p style="width: 100%; text-align: center">Update the schedule of your bus</p>
       </div>
       <button class="btn btn-danger pull-right" onClick="addTrip(bid)"> Add New Trip </button>
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

        <div class="form-group">
            <select name="bus" class="form-control form-control-solid placeholder-no-fix">
            </select>
        </div>

        <div class="form-actions">
            <button class="btn red btn-block" onclick="setForUpdate()">Select</button>
        </div>

    </div>

</div>


</body>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bus_list.js"></script>
<script> bus_initialize("bus")</script>
<script src="js/admin_schedule.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>