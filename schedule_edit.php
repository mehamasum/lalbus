
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

</head>
<body>
<?php include("includes/static_top.php"); ?>

<div class="container" >
    <h3 style="width: 100%; text-align: center">Update Bus Schedule</h3>
    <p style="width: 100%; text-align: center">Update the schedule of Choitaly</p>
    <table class="table table-striped col-md-12" >
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

<script>
    var sid=11;
</script>
</body>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/schedule_edit.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>