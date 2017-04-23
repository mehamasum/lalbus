
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
        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="css/static_top.css">
        <script src="js/sorttable.js"></script>
        <script src="js/schedule.js"></script>

    </head>
    <body>
    <?php include("includes/static_top.html");?>
    <div class="dropdown">
        <button id ="busname_top" class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
            Name of the Bus
            <span class="caret"></span></button>
        <ul class="dropdown-menu">



        <?php
        include_once ('backend/dbconnect.php');
        $sql = "select * from bus";

        $result = $conn->query($sql);

        $n = $result->num_rows;
        for($i=0; $i<$n; $i++) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $route = $row['route'];
            $id = $row['id'];

            echo "<li><button class='btn btn-block' onclick='search($id,\"$name\")'>$name</button></li>";
        }
        ?>


        </ul>
    </div>

    <div id="received_table">

    </div>

</body>
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
</html>