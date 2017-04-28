<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/25/2017
 * Time: 12:16 AM
 */
session_start();
include_once ('backend/dbconnect.php');
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
else
{
    $user = $_SESSION['id'];
    $sql = "select * from users WHERE id=$user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $level=$row['level'];
    $bus=$row['bus_id'];
    if($level==0)
    {
        ob_start();
        header('Location: home');
        ob_end_flush();
        die();
    }
    echo $user;
}

?>


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
           <p style="width: 100%; text-align: center">Update the schedule of Choitaly</p>
       </div>
       <button class="btn btn-danger pull-right" onClick="addTrip()"> Add New Trip </button>
   </div>


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


</body>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/admin_schedule.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>