<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/25/2017
 * Time: 12:16 AM
 */
include_once("validator/member_auth_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Validation | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">


</head>
<body onload="initialize(<?php echo $_SESSION['id']; ?>)">
<?php include("includes/static_top.php"); ?>
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_member_authorization").className += "active";
</script>

<div class="container">

    <div>
        <span>
            <h3>Committee Member Requests</h3>
            <span>Authorize bus committee members</span>
        </span>
        <button class="btn btn-danger pull-right" onClick="window.location.reload()"> Refresh </button>
    </div>

    <br><br>



    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Registration Number</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Department</th>
            <th>Bus</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="usertable_body">
        </tbody>
    </table>


</div>

</body>

<!-- Bootstrap core JavaScript -->
<script src="js/member_auth.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>