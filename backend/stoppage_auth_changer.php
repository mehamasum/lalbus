<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 3:52 PM
 *
 */

session_start();
include_once ('dbconnect.php');
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
else
{
    $suser = $_SESSION['id'];
    $sql = "select * from users WHERE id=$suser";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $level=$row['level'];
    if($level<2)
    {
        echo "ERR";
        die();
    }
}

/*
Transfer from Places_request to Places
*/
$state = mysqli_real_escape_string($conn,$_POST['state']);
$stoppage = mysqli_real_escape_string($conn,$_POST['id']);
$update_mode=mysqli_real_escape_string($conn,$_POST['mode']);
$error=false;

$sql = "select * from places_request WHERE id=$stoppage";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$updater=$row["user_id"];
$stoppage_name=mysqli_real_escape_string($conn,$row['stoppage_name']);

if($state==0) { // Rejected

    $sql = "DELETE from `places_request` WHERE id=$stoppage;";
    echo $sql;


    if ($conn->query($sql) == TRUE) {
        echo "ONE";
        $sql="SELECT * from users WHERE id=$updater;";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        $repu=$row["neg_repu"];
        $repu=$repu+2;
        $sql="UPDATE users SET neg_repu=$repu WHERE id=$updater;";
        if ($conn->query($sql) == TRUE) {
            //User Reputation Updated
            echo "DONE";
            die();
        }
        else {
            $error=true;
            echo "ERR";
            die();
        }
    }
    else {
        $error=true;
        echo "ERR";
    }

}

//Bus	Trip Type	Time	Endpoint	Driver	Bus Number	Comment	User	User Reputation	Suggested at

else { // Accepted

    /* Update Stoppage Database */
    if($update_mode==0)//update
    {
        //id	update_type	stoppage_name	lat	lng	bus_id	stoppage_type	remarks	user_id	requested_on
        $sql="UPDATE places SET stoppage_name='$stoppage_name',lat='$row[lat]',lng='$row[lng]',bus_id=$row[bus_id],stoppage_type=$row[stoppage_type],remarks='$row[remarks]'  WHERE  stoppage_name='$row[stoppage_name]';";
    }
    else if ($update_mode==1)
    {
        $sql="INSERT INTO `places` (`id`, `stoppage_name`, `lat`, `lng`, `bus_id`, `stoppage_type`, `remarks`) VALUES (NULL, '$row[stoppage_name]', '$row[lat]', '$row[lng]', '$row[bus_id]', '$row[stoppage_type]', '$row[remarks]');";
    }
    else if($update_mode==2)
    {
        $sql="DELETE FROM places WHERE id=$stoppage";
    }

    // echo $sql;

    if($conn->query($sql)==FALSE)
    {
        echo "ZERO";
        $sql = "DELETE from `places_request` WHERE id=$stoppage;";
        if ($conn->query($sql) == TRUE) {
            //Stoppage Cleared
            echo "DEL";
        }
        else {
            $error=true;
            echo "ERR";
        }
        die();
    }
    else
     {
         echo "THREE";
         $sql = "DELETE from `places_request` WHERE id=$stoppage;";
         if ($conn->query($sql) == TRUE) {
             //Stoppage Cleared
             echo "TWO";
         }
         else {
             $error=true;
             echo "ERR";
             die();
         }
     }


    /*Increase Reputation for user */
    $sql="SELECT * from users WHERE id=$updater;";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $repu=$row["pos_repu"];
    $repu=$repu+10;
    $sql="UPDATE users SET pos_repu=$repu WHERE id=$updater;";
    if ($conn->query($sql) == TRUE) {
        //User Reputation Updated
        echo "DONE";
        sendMail($conn,$updater,$stoppage_name);
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }


}

function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}


function sendMail($conn,$user,$stoppage_name)
{
    $sql = "SELECT * FROM users  WHERE id=$user;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $email=$row['email'];
    $name=$row['name'];
    $pos_repu=$row['pos_repu'];
    sendConfirmation($email,$name,$stoppage_name,$pos_repu);
}

function sendConfirmation($email,$name,$stoppage_name,$pos_repu)
{
    require_once 'lib/swift_required.php';
    $subject = 'Lalbus | Update Approved!'; // Give the email a subject
    $address="http://csedu.cf/lalbus/home";
    if(is_localhost())
        $address="http://localhost/lalbus/home";
    $body = '
 
Dear '.$name.',
Congratulations! Your Update for the stoppage '.$stoppage_name.' has been approved. You have been awarded 10 reputation points for your contribution, you can check it in your LalBus profile.
------------------------
Reputation Points : '.$pos_repu.'
HOME : '.$address.'
------------------------

Regards,
Team Lalbus
';

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
        ->setUsername('lalbus.du@gmail.com')
        ->setPassword('lalbusweb')
        ->setEncryption('ssl');

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance($subject)
        ->setFrom(array('noreply@lalbus.com' => 'Lalbus'))
        ->setTo(array($email))
        ->setBody($body);

    if (!$mailer->send($message, $failures))
    {
        echo "Failures:";
        print_r($failures);
        return false;
    }
    else
    {
        return true;

    }


}


?>
