<?php
session_start();

require_once('dbconnect.php');

$email = mysqli_real_escape_string($conn,$_POST['e']);
$password = mysqli_real_escape_string($conn,$_POST['p']);
// sql injection check

// query
$sql = "SELECT * FROM users WHERE email='". $email . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $hash = $row['password'];

    $status= $row['status'];

    if (hash_equals($hash, crypt($password, $hash)) ) {

        $_SESSION['id']=$row['id'];
		$_SESSION['name']=$row['name'];

        if($status==1)
        {
            echo "UNVERIFIED";
        }

		if($row['level']<2)
            echo "ONE";

		if($row['level']==2)
		    echo "ADMIN";
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
