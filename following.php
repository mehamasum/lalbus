<?php include_once("includes/login_session_check.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Following | Lalbas</title>
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
    var id=<?php echo $_SESSION['id']; ?>;
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_following").className += "active";
</script>

<div class="container" >
    <h3 style="width: 100%; text-align: center">Follow Buses</h3>
    <p style="width: 100%; text-align: center">Buses you follow will show up in your home</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Bus Name</th>
            <th>Route</th>
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
<script src="js/following.js"></script>
<script>
    initialize_following();
</script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>