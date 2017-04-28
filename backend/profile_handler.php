<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 7:49 PM
 */

session_start();

//  xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm);

// no injection
require_once('dbconnect.php');

$name =mysqli_real_escape_string($conn, $_POST['n']);
$reg_no =mysqli_real_escape_string($conn,$_POST['r']);
$mob_no = mysqli_real_escape_string($conn,$_POST['m']);
$comm =  mysqli_real_escape_string($conn,$_POST['c']);
$bus_id = mysqli_real_escape_string($conn,$_POST['b']);
$dept_id= mysqli_real_escape_string($conn,$_POST['d']);
$uid=mysqli_real_escape_string($conn,$_POST['id']);
// check for sql injection


$comm = intval($comm);
$dept_id=intval($dept_id);
$bus_id=intval($bus_id);
//echo $comm;


// already in ?
$sql = "SELECT * FROM users WHERE id=$uid";
$result = $conn->query($sql);
$row=$result->fetch_row();
$oldbus=$row['bus_id'];
if ($result->num_rows == 0) {
    echo "ZERO";
}
else {
    // update in db

    $sql="UPDATE users SET name='$name',reg_no='$reg_no',mob_no='$mob_no',bus_id='$bus_id',level_req='$comm',dept_id='$dept_id' where id=$uid;";

         //echo $sql;

    if ($conn->query($sql) == TRUE) {

        //TODO : Remove $oldbus from following
        $check="SELECT * FROM following WHERE user_id=$uid and bus_id=$bus_id";
        $res=$conn->query($check);
        if($res->num_rows==0)
        {
            $follow = "INSERT INTO following (user_id, bus_id)".
                "VALUES ($uid, $bus_id)";

            $conn->query($follow);
        }

        $_SESSION['name']=$name;
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}


mysqli_close($conn);


?>

