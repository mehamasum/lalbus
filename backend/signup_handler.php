<?php
session_start();

//  xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm);

// no injection
require_once('dbconnect.php');


$name =mysqli_real_escape_string($conn, $_POST['n']);
$reg_no =mysqli_real_escape_string($conn,$_POST['r']);
$email=mysqli_real_escape_string($conn,$_POST['e']);
$password = mysqli_real_escape_string($conn,$_POST['p']);
$comm =  mysqli_real_escape_string($conn,$_POST['c']);
$bus_id = mysqli_real_escape_string($conn,$_POST['b']);

// check for sql injection


$comm = intval($comm);
//echo $comm;


// already in ?
$sql = "SELECT * FROM users WHERE reg_no='$reg_no' OR email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "ZERO";
}
else {
    // insert in db

    $cost = 10;


    // Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    // Prefix information about the hash so PHP knows how to verify it later.
    // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

    // Hash the password with the salt
    $hash = crypt($password, $salt);


    $six_digit_random_number = mt_rand(100000, 999999);


    $sql = "INSERT INTO users (name, reg_no,email, password, bus_id, level_req, status, code,dept_id) ".
        "VALUES ('" .  $name . "','" . $reg_no . "','". $email . "','" . $hash . "', " . $bus_id . "," . $comm . ", ". 1 .",". $six_digit_random_number. ", ". 0 . ");";
    //echo $sql;


    if ($conn->query($sql) == TRUE) {

        $_SESSION['id']=$conn->insert_id;
        $_SESSION['name']=$name;


        $follow = "INSERT INTO following (user_id, bus_id) VALUES ($conn->insert_id, $bus_id)";
        //echo $follow;

        $conn->query($follow);
        if(sendVerificationBySwift($email,$name,$six_digit_random_number))
            echo $_SESSION['id'];
        else
            echo "INVALID";


    }
    else {
        echo "ERR";
    }
}

mysqli_close($conn);


function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}


function sendVerificationBySwift($email,$name,$id)
{
    require_once 'lib/swift_required.php';

    $subject = 'Lalbus Signup | Verification'; // Give the email a subject
    $address="http://csedu.cf/lalbus/verify?email=".$email."&hash=".$id;
    if(is_localhost())
        $address="http://localhost/lalbus/verify?email=".$email."&hash=".$id;
    $body = '
 
Dear '.$name.',
Thanks for signing up!
Your account has been created, you can login after you have activated your account by clicking on the link below.
 
------------------------
Activation Link : '.$address.'
------------------------

If this wasn\'t you, please ignore this email.

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

