<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/5/2017
 * Time: 1:36 AM
 *
 * TODO : Finish it, Currently same as Member auth
 * ADD 10 reputation point for user accepted schedule, -1 for rejected schedule
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
$schedule = mysqli_real_escape_string($conn,$_POST['id']);
$update_mode=mysqli_real_escape_string($conn,$_POST['mode']);
$old_schedule=mysqli_real_escape_string($conn,$_POST['ref']);
$error=false;
if($state==0) { // Rejected

    $sql = "DELETE from `schedule_request` WHERE id=$schedule;";
    echo $sql;
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
    $sql = "select * from schedule_request WHERE id=$schedule";
    $result = $conn->query($sql);
    if($result==FALSE)
    {
        echo "ZERO";
        die();
    }
    $row=$result->fetch_assoc();
    $updater=$row["user_id"];
    $bus=$row['bus_id'];

    /* Update Schedule Database */
    if($update_mode==0)//update
    {
        $sql="UPDATE schedule SET bus_id=$bus,trip_type=$row[trip_type],time='$row[time]',endpoint='$row[endpoint]',driver='$row[driver]',bus_number='$row[bus_number]',comment='$row[comment]'  WHERE  id=$old_schedule;";

    }
     else if ($update_mode==1)
     {
         $sql="INSERT INTO `schedule` (`id`, `bus_id`, `trip_type`, `time`, `endpoint`, `driver`, `bus_number`, `comment`) VALUES (NULL, $row[bus_id], $row[trip_type], '$row[time]','$row[endpoint]','$row[driver]','$row[bus_number]','$row[comment]');";
     }
     else if($update_mode==2)
     {
         $sql="DELETE FROM `schedule` WHERE id=$old_schedule";
     }


   // echo $sql;
    if ($conn->query($sql) == TRUE) {
        //Schedule Database Updated
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
        sendMail($conn,$updater,$bus);
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

    /* Clear Request from database */
    $sql = "DELETE from `schedule_request` WHERE id=$schedule;";
    if ($conn->query($sql) == TRUE) {
        //Schedule Cleared
        echo "ONE";
    }
    else {
        $error=true;
        echo "ERR";
        die();
    }

}


function sendMail($conn,$user,$bus_id)
{
    $sql = "SELECT * FROM users  WHERE id=$user;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $email=$row['email'];
    $name=$row['name'];
    $pos_repu=$row['pos_repu'];

    $sql = "SELECT * FROM bus  WHERE id=$bus_id;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $bus_name=$row['name'];
    sendConfirmation($email,$name,$bus_name,$pos_repu);
}

function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
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
Congratulations! Your Update for the schedule of '.$bus_name.' has been approved. You have been awarded 10 reputation points for your contribution, you can check it in your LalBus profile.
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
        echo "Mailed";
    }


}


?>
