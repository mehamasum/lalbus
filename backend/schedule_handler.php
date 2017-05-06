<?php
include_once('dbconnect.php');

if (isset($_POST['bus_id']) && !empty($_POST['bus_id'])) {
    $bus_id= mysqli_real_escape_string($conn, $_POST['bus_id']);
}
else {
    $bus_id=2;
}

$busquery=$conn->query("SELECT `name` FROM `bus` WHERE `id` = $bus_id");
$value = $busquery->fetch_assoc();
$busname=$value['name'];

$query="SELECT * FROM `schedule` WHERE `bus_id` = $bus_id AND `trip_type` = 0 ORDER BY `time` ASC";

$result= $conn->query($query);

$commentquery="select COUNT(`comment`) from `schedule` WHERE `bus_id` =". $bus_id." AND `trip_type` = 0 AND `comment` != \"\" ";
$commentId=$conn->query($commentquery);

$get_total_rows = $commentId->fetch_row(); //hold total records in variable

if($get_total_rows[0] > 0)
{
    $commentStatus =1;
}
else
{
    $commentStatus=0;
}

?>
<style>
    table {
        width: 100%;
        float : left;
        border-collapse: collapse;

    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: white;
        color: black;
    }
</style>

<table class="table" >
    <thead>
    <tr>
        <?php
        if($commentStatus==0)
            echo "<th> $busname : Up Trip</th>";
        else
            echo "<th> $busname : Up Trip</th>";
        ?>

    </tr>
    <tr>
        <?php
        echo "<th>Time</th>";
        echo "<th>Start</th>";
        echo "<th>Bus_Number</th>";
        if($commentStatus==1)
            echo "<th>Note</th>"
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row = $result->fetch_assoc())
    {
        echo
        "<tr>
              <td>{$row['time']}</td>
              <td>{$row['endpoint']}</td>
              <td>{$row['bus_number']}</td>";
        if($commentStatus===1)
            echo "<td>{$row['comment']}</td>";
        echo "</tr>\n";
    }
    ?>
    </tbody>
</table>

<?php

//$query = "SELECT * FROM schedule";
$query="SELECT * FROM `schedule` WHERE `bus_id` = $bus_id AND `trip_type` = 1  ORDER BY `time` ASC";

$result= $conn->query($query);

$commentquery="select COUNT(`comment`) from `schedule` WHERE `bus_id` =". $bus_id." AND `trip_type` = 1 AND `comment` != \"\" ";
$commentId=$conn->query($commentquery);

$get_total_rows = $commentId->fetch_row(); //hold total records in variable

if($get_total_rows[0] > 0)
{
    $commentStatus =1;
}
else
{
    $commentStatus=0;
}
?>
<table class="table">
    <thead>
    <tr>
        <?php
        if($commentStatus==0)
            echo "<th> $busname : Down Trip</th>";
        else
            echo "<th> $busname : Down Trip</th>";
        ?>

    </tr>
    <tr>
        <?php
        echo "<th>Time</th>";
        echo "<th>Destination</th>";
        echo "<th>Bus_Number</th>";
        if($commentStatus==1)
            echo "<th>Note</th>"
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row = $result->fetch_assoc())
    {
        echo
        "<tr>
              <td>{$row['time']}</td>
              <td>{$row['endpoint']}</td>
              <td>{$row['bus_number']}</td>";
        if($commentStatus===1)
            echo "<td>{$row['comment']}</td>";
        echo "</tr>\n";
    }
    ?>
    </tbody>
</table>
<?php $conn->close()?>

</body>

</html>