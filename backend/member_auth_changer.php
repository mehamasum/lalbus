<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 4/25/2017
 * Time: 12:58 AM
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


$state = mysqli_real_escape_string($conn, $_POST['state']);
$user = mysqli_real_escape_string($conn, $_POST['id']);

if($state==0) { // Rejected
    $sql = "UPDATE users SET `level`=0,`level_req`=0 WHERE id=$user;";
    if ($conn->query($sql) == TRUE) {
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}
else { // Accepted
    $sql = "UPDATE users SET `level`=1 WHERE id=$user;";
    if ($conn->query($sql) == TRUE) {
        sendMail($conn,$user);
        echo "ONE";
    }
    else {
        echo "ERR";
    }
}


function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}


function sendMail($conn,$user)
{
    $sql = "SELECT * FROM users  WHERE id=$user;";
    $result=$conn->query($sql);
    if($result->num_rows <1)
    {
        echo "ERR";
        die();
    }
    $row=$result->fetch_assoc();
    $email=$row['email'];
    $name=$row['name'];
    $bus_id=$row['bus_id'];

    $sql = "SELECT * FROM bus  WHERE id=$bus_id;";
    $result=$conn->query($sql);
    if($result->num_rows <1)
    {
        echo "ERR";
        die();
    }
    $row=$result->fetch_assoc();
    $bus_name=$row['name'];
    sendConfirmation($email,$name,$bus_name);
}

function sendConfirmation($email,$name,$bus_name)
{
    require_once 'lib/swift_required.php';

    $subject = 'Lalbus | Congratulations!'; // Give the email a subject
    $address="http://csedu.cf/lalbus/home";
    if(is_localhost())
        $address="http://localhost/lalbus/home";
    $body = '
 
Dear '.$name.',
Congratulations! You have been approved as a committee member of '.$bus_name.'. You can now edit schedules, bus routes and bus stoppages.

If an admin approves your edit, you get 10 reputation point for each successful edit.Rejected edits result in -2 reputation points.

------------------------
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

