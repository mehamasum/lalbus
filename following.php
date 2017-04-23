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
    <title>Following | Lalbas</title>
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
<?php include("includes/static_top.php"); ?>
<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_following").className += "active";
</script>

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
        </tbody>
    </table>
</div>


</body>


<script>

    // add data

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            var parent = document.getElementById("table_body");

            var reply = JSON.parse(this.responseText);
            console.log(reply[0]);

            var idx;
            for( idx=0; idx<reply[0].length; idx++) {
                following.push(reply[0][idx]["bus_id"]);
            }

            console.log(reply[1]);

            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                busses.push(obj);
            }


            // echo "var obj=$bus_id; following.push(obj);\n";
            // echo "var obj={\"id\":$id, \"name\":'$name', \"route\":'$route'}; busses.push(obj); \n";

            // then add this

            var i=0;

            for(i=0; i<following.length; i++) {
                console.log(following[i]);
            }

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

        }
    };
    xhttp.open("POST", "backend/following_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+ <?php echo $_SESSION['id']; ?>);

</script>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>