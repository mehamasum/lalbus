<?php include_once("validator/login_session_check.php") ?>
<script>
    var id=<?php echo $_SESSION['id'];?>;
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Lalbas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/static_top.css">
    <link rel="stylesheet" href="css/home.css">
    <script src='js/nprogress.js'></script>
    <link rel='stylesheet' href='css/nprogress.css'/>
    <script src="js/home.js"></script>
</head>

<body onload='initData()'>
    <?php include("includes/static_top.php"); ?>

    <div id='map'></div>

    <div id="data">
        <select id="followingList" class="form-control" onchange="findMyBus(this.value, this.options[this.selectedIndex].innerHTML);">
        </select>
        <div id="resultDetails">
        </div>


        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeH9FGEigaoT9FRddspqhiIe75TZLJ48&callback=initMap">
        </script>

</body>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->


</html>