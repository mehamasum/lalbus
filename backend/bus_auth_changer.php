<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/7/2017
 * Time: 1:49 AM
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

$state = mysqli_real_escape_string($conn,$_POST['state']);
$bus = mysqli_real_escape_string($conn,$_POST['id']);
$update_mode=mysqli_real_escape_string($conn,$_POST['mode']);
$old_bus=mysqli_real_escape_string($conn,$_POST['ref']);
$error=false;
if($state==0) { // Rejected

    $sql = "DELETE from `bus_request` WHERE id=$bus;";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        $error=true;
        echo "ERR";
    }
}

//Bus	Trip Type	Time	Endpoint	Driver	Bus Number	Comment	User	User Reputation	Suggested at

else { // Accepted

    $sql = "select * from bus_request WHERE id=$bus";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $updater=$row["user_id"];

    $name=mysqli_real_escape_string($conn,$row['name']);
    $route=mysqli_real_escape_string($conn,$row['route']);

    /* Update bus Database */
    if($update_mode==0)//update
    {
        $sql="UPDATE bus SET name='$name',route='$route' WHERE  id=$old_bus;";

    }
    else if ($update_mode==1)
    {
        $sql="INSERT INTO `bus` (`id`, `name`, `route`) VALUES (NULL, '$name','$route');";
    }
    else if($update_mode==2)
    {
        $sql="DELETE FROM `bus` WHERE id=$old_bus";
    }


    if ($conn->query($sql) == TRUE) {
        //bus Database Updated
        echo "THREE";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

    /*Increase Reputation for user */
    $sql="SELECT * from users WHERE id=$updater";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $repu=$row["pos_repu"];
    $repu=$repu+10;
    $sql="UPDATE users SET pos_repu=$repu WHERE id=$updater;";
    if ($conn->query($sql) == TRUE) {
        //User Reputation Updated
        echo "TWO";
        sendMail($conn,$updater,$name);
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

    /* Clear Request from database */
    $sql = "DELETE from `bus_request` WHERE id=$bus;";
    if ($conn->query($sql) == TRUE) {
        //bus Cleared
        echo "ONE";
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


function sendMail($conn,$user,$bus_name)
{
    $sql = "SELECT * FROM users  WHERE id=$user;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $email=$row['email'];
    $name=$row['name'];
    $pos_repu=$row['pos_repu'];
    sendConfirmation($email,$name,$bus_name,$pos_repu);
}

function sendConfirmation($email,$name,$bus_name,$pos_repu)
{
    require_once 'lib/swift_required.php';

    $subject = 'Lalbus | Update Approved!'; // Give the email a subject
    $address="http://csedu.cf/lalbus/home";
    if(is_localhost())
        $address="http://localhost/lalbus/home";
    $body = '
 
Dear '.$name.',
Congratulations! Your Update for '.$bus_name.' has been approved. You have been awarded 10 reputation points for your contribution, you can check it in your profile.
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
        return true;

}

?>
