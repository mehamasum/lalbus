<?php include_once("includes/login_session_check.php") ?>
<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 1:11 PM
 */
    include_once ('backend/dbconnect.php');

$schedule_id=$_GET['id'];
$mode=$_GET['m'];
$bus_id=$_GET['b'];
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
else if($level==1 && $bus_id!=$bus )
{
    echo "UNAUTHORIZED";
    ob_start();
    header('Location: home');
    ob_end_flush();
    die();
}


if($mode==0)
{
    $sql = "select * from schedule WHERE id=$schedule_id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $trip_type=$row['trip_type'];
    $time=$row['time'];
    $endpoint=$row['endpoint'];
    $driver=$row['driver'];
    $bus_number=$row['bus_number'];
    $comment=$row['comment'];
}
else
{
    $trip_type=0;
    $time="";
    $endpoint="";
    $driver="";
    $bus_number="";
    $comment="";
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Update Schedule | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
</head>

<script >
    var schedule_id=<?php echo $schedule_id?>;
    var mode=<?php echo $mode?>;
    var bus_id=<?php echo $bus_id?>;
    var trip_val=<?php echo $trip_type ?>;
    console.log(schedule_id);
    console.log(trip_val);
</script>

<body class="login">

<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<div class="content">

    <form class="login-form" action="#" method="POST">
        <h3 class="form-title font-dark">Update Schedule</h3>
        <br>
        <div class="form-group">
            <input type="text" name="time" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Trip Time" value="<?php echo $time ?>" minlength="3" maxlength="10" required="">
        </div>

        <div class="form-group">
            <select name="trip_type" class="form-control form-control-solid placeholder-no-fix">
                <option value="0" >Up Trip</option>
                <option value="1" >Down Trip</option>
            </select>
        </div>

        <div class="form-group">
            <div>
                <input type="text" name="endpoint" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Start/ Destination of the Bus" value="<?php echo $endpoint ?>" required="">
            </div>

        </div>

        <div class="form-group">
            <div>
                <input type="text" name="driver" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Name or Number of the Driver" value="<?php echo $driver ?>" required="">
            </div>

        </div>
        <div class="form-group">
            <div>
                <input type="text" name="notes" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Special Mentions about this trip the" value="<?php echo $comment ?>" required="">
            </div>

        </div>

        <div class="form-group">
            <input type="text" name="bus_no" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Bus Number" value="<?php echo $bus_number ?>" required="">
        </div>


        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button" onclick="validateScheduleEdit()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>

</body>
<script src="js/schedule_editor.js"></script>
<script>
    setValue();
</script>
<script src="js/main.js"></script>

