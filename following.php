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

    <script>
        var busses = [];
        var following = [];

        Array.prototype.contains = function (need) {
            for(idx in this) {
                if(this[idx]==need) return true;
            }
            return false;
        }

    </script>


</head>
<body>
<?php include("includes/static_top.html"); ?>

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
        <tbody id="table_body">

        <?php

        include_once ('backend/dbconnect.php');

        $sid = $_SESSION['id'];
        $sql = "select * from following where user_id = $sid";
        $result = $conn->query($sql);
        $n = $result->num_rows;
        for($i=0; $i<$n; $i++) {
            $row = $result->fetch_assoc();
            $bus_id = $row['bus_id'];
            echo "<script> var obj=$bus_id; following.push(obj);</script>";
        }


        $sql = "select * from bus";

        $result = $conn->query($sql);

        $n = $result->num_rows;
        for($i=0; $i<$n; $i++) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $route = $row['route'];
            $id = $row['id'];


            echo "<script> var obj={\"id\":$id, \"name\":'$name', \"route\":'$route'}; busses.push(obj); console.log(obj);</script>";

            //echo "<tr><td>$name</td><td>$route</td><td><button onclick='toggleFollow(".$id.")' class='btn btn-danger pull-right'>Follow</button></td></tr>";

        }
        ?>



        </tbody>
    </table>
</div>


</body>


<script>
    var i=0;

    for(i=0; i<following.length; i++) {
        console.log(following[i]);
    }

    var parent = document.getElementById("table_body");

    console.log(busses.length);

    for(i=0; i<busses.length; i++) {
        console.log(busses[i]);
        console.log(i);
        console.log(busses.length);
        var b_id = busses[i]["id"];
        var b_name = busses[i]["name"];
        var b_route = busses[i]["route"];
        if(following.contains(b_id)) {
            parent.innerHTML+="<tr><td>"+b_name+"</td><td>"+b_route+"</td><td><button onclick='toggleFollow("+b_id+","+0+")' id='btn_"+b_id +"' class='btn btn-danger pull-right'>Unfollow</button></td></tr>";
        } else {
            parent.innerHTML+="<tr><td>"+b_name+"</td><td>"+b_route+"</td><td><button onclick='toggleFollow("+b_id+","+1+")' id='btn_"+b_id +"' class='btn btn-success pull-right'>Follow</button></td></tr>";
        }
    }


</script>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>