<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        ob_start();
        header('Location: login.php');
        ob_end_flush();
        die();
    }
?>

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
    <script src="js/following.js"></script>


</head>
<body>
<?php include("includes/static_top.php"); ?>

<div class="container">
    <h3>Follow Buses</h3>
    <p>Buses you follow will show up in your home</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Bus Name</th>
            <th>Route</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

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

            echo "<tr><td>$name</td><td>$route</td><td><button onclick='toggleFollow(".$id.")' class='btn btn-danger pull-right'>Follow</button></td></tr>";

        }
        ?>



        </tbody>
    </table>
</div>


</body>
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>