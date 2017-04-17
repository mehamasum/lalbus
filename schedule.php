
<!doctype html>
    <html lang="en">
    <?php

        if (isset($_POST['bus_id']) && !empty($_POST['bus_id'])) {
            $bus_id= $_POST['bus_id'];
        }
        else {
            $bus_id=11;
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lalbus_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $conn->query("SET CHARACTER SET utf8");
        $conn->query("SET SESSION collation_connection =’utf8_general_ci'");

        if($conn->connect_error)
        {
            die("Database connection error".$conn->connect_error);
        }

        $busquery=$conn->query("SELECT `name` FROM `bus` WHERE `id` = $bus_id");
        $value = $busquery->fetch_assoc();
        $busname=$value['name']

    ?>
    <head>
      <meta charset="UTF-8">
      <title>Schedule</title>
        <script src="js/sorttable.js"></script>
        <style>
            table {
                float : left;
                border-collapse: collapse;
                width: 40%;
                margin-right: 10%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #796799;
                color: white;
            }
        </style>
    </head>
    <body>
      <?php

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
      <div style="overflow-x:auto;">

      <table class="sortable" >
          <thead>
          <tr>
              <?php
              if($commentStatus==0)
                  echo "<th colspan=\"3\" style='text-align: center ;font-size: larger; background-color: #8815ff'> $busname : Up Trip</th>";
              else
                  echo "<th colspan=\"4\" style='text-align: center ;font-size: larger; background-color: #8815ff'> $busname : Up Trip</th>";
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
          <table class="sortable">
              <thead>
              <tr>
                  <?php
                  if($commentStatus==0)
                      echo "<th colspan=\"3\" style='text-align: center ;font-size: larger; background-color: #8815ff'> $busname : Down Trip</th>";
                  else
                      echo "<th colspan=\"4\" style='text-align: center ;font-size: larger; background-color: #8815ff'> $busname : Down Trip</th>";
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
      </div>
<?php $conn->close()?>

</body>
</html>