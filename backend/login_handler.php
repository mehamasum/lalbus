<?php
session_start();

$mob = $_POST['m'];
$password = $_POST['p'];

require_once('dbconnect.php');

// sql injection check

// query
$sql = "SELECT * FROM users WHERE mob_no='". $mob . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $hash = $row['password'];

    if (hash_equals($hash, crypt($password, $hash)) ) {

        $_SESSION['id']=$row['id'];
        echo "ONE";

        /*$reply = array('name'=>$row['name'],
            'url'=>$row['url']);

        echo json_encode($reply)."\n";


        $sql = "SELECT sts_id, upvoted, resolved FROM UpvoteDB WHERE email='". $email . "'";
        $results = $conn->query($sql);

        if ($results->num_rows==0) {
            echo "####NOVOTES####";
        }
        else {

            $jsonData = array();

            foreach($results as $row){
                $jsonData[] = $row;
            }
            echo json_encode($jsonData)."\n";
        }*/
    }
    else {
        echo "ERR";
    }

}
else {
    echo "ZERO";
}

mysqli_close($conn);


?>
