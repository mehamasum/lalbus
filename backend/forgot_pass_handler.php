<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/6/2017
 * Time: 1:39 AM
 */
session_start();

require_once('dbconnect.php');
$selected= mysqli_real_escape_string($conn,$_POST['s']);
$email = mysqli_real_escape_string($conn,$_POST['e']);
$reg_no = mysqli_real_escape_string($conn,$_POST['p']);

// sql injection check

// query
$sql = "SELECT * FROM users WHERE email='". $email . "' or reg_no='".$reg_no."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $email=$row['email'];
    $name=$row['name'];
    $code=$row['code'];
    if(sendVerificationBySwift($email,$name,$code))
        echo "ONE";
    else
        echo "ERR";

}
else {
    echo "ZERO";
}

mysqli_close($conn);


function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}


function sendVerificationBySwift($email,$name,$code)
{
    require_once 'lib/swift_required.php';

    $subject = 'Lalbus | Password Reset'; // Give the email a subject
    $address="http://csedu.cf/lalbus/change_pass?email=".$email."&hash=".$code;
    if(is_localhost())
        $address="http://localhost/lalbus/change_pass?email=".$email."&hash=".$code;
    $body = '
 
Dear '.$name.',
Thanks for contacting us! You can now reset your password by pressing the url below.
 
------------------------
Password Reset Link :  '.$address.'
------------------------

If this wasn\'t you, please ignore this email.

Regards,
Team Lalbus';

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
