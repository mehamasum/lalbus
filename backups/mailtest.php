<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/26/2017
 * Time: 2:02 AM
 */
$email='fahim6119@gmail.com';
$name='fahim';
$id=954186;

sendVerificationBySwift($email,$name,$id);
sendVerification($email,$name,$id);

function sendVerificationBySwift($email,$name,$id)
{
    require_once 'lib/swift_required.php';

    $subject = 'Lalbus Signup | Verification'; // Give the email a subject
    $body = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
------------------------
 
Please click this link to activate your account:
http://localhost/lalbus/verify.php?email='.$email.'&hash='.$id.'
 
'; // Our message above including the link

    $headers = 'From:noreply@batfia.com' . "\r\n"; // Set from headers

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
        ->setUsername('lalbus.du@gmail.com')
        ->setPassword('lalbusweb');

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance($subject)
        ->setFrom(array('noreply@lalbus.com' => 'Lalbus'))
        ->setTo(array($email))
        ->setBody($body)
        ->setEncryption('ssl');

    try {
        $number_sent=$mailer->send($message,$failures);
        print('failed '.$number_sent);
    }
    catch (Swift_RfcComplianceException $e)
    {
        print('Email address not valid:' . $e->getMessage());
        echo 'FAILURES:<BR><PRE>';
        print_r($failures);
        echo '</PRE>';
    }

}


function sendVerification($email,$name,$id)
{
    $subject = 'Lalbus Signup | Verification'; // Give the email a subject
    $body = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
------------------------
 
Please click this link to activate your account:
http://103.28.121.126/lalbus/verify.php?email='.$email.'&hash='.$id.'
 
';

    $headers = array("From: lalbus@du.ac.bd",
        "MIME-Version: 1.0",
     "Content-Type: text/html; charset=ISO-8859-1",
    "X-Mailer: PHP/" . PHP_VERSION
    );
    $headers = implode("\r\n", $headers);

    mail($email, $subject, $body, $headers);
}
?>