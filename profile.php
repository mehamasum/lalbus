<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/27/2017
 * Time: 7:49 PM
 */

session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}

include_once ('backend/dbconnect.php');
$userid=$_SESSION['id'];


$sql = "select * from users WHERE id=$userid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name=$row['name'];
$reg_no=$row['reg_no'];
$mob_no=$row['mob_no'];
$email=$row['email'];
/*$password=$row['password'];*/
$dept_id=$row['dept_id'];
$bus=$row['bus_id'];
$user_level=$row['level_req'];

?>

<!DOCTYPE html>

<html>

<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Profile | Lalbus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="./css/screen.css">
    <link rel="stylesheet" href="./css/profile.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">
</head>

<body class="login">
<?php include("includes/static_top.php"); ?>
<div class="logo">
    <a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
</div>

<script>
    document.getElementById("page_home").classList.remove("active");
    document.getElementById("page_user").className += "active";
    var bus_default=<?php echo $bus ?>;
    var dept_default=<?php echo $dept_id ?>;
    var id=<?php echo $userid ?>;
    console.log(bus_default);
    console.log(dept_default);
</script>
<div class="content">

    <form class="login-form" action="#" method="POST">
        <h3 class="form-title font-dark">Update your profile</h3>
        <br>
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Name" value="<?php echo $name ?>" minlength="3" maxlength="64" required="">
        </div>

        <div class="form-group">
            <input type="number" name="reg_no" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="DU Reg No (2017812...)" value="<?php echo $reg_no ?>" required="">
        </div>

        <div class="form-group">
            <input type="text" name="dept_name"  list="deptlist" class="form-control form-control-solid placeholder-no-fix" list="json-datalist" placeholder="Department" value="" minlength="3" required="" >
            <datalist id="deptlist"></datalist>
        </div>

        <div class="form-group">
            <div>
                <input type="number" name="mob_no" class="form-control form-control-solid placeholder-no-fix"
                       placeholder="Mobile (015...)" value="<?php echo $mob_no ?>" minlength="11" required="">
            </div>

        </div>

        <div class="form-group">
            <div>
                <input type="email" name="email" class="form-control form-control-solid placeholder-no-fix"
                       value="<?php echo $email ?>" readonly>
            </div>

        </div>



<!--
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-solid placeholder-no-fix"
                   placeholder="Password" value="<" minlength="8" required="" readonly>
        </div>
-->

        <div class="form-group">
            <input type="text" name="bus"  list="buslist" class="form-control form-control-solid placeholder-no-fix" list="buslist" placeholder="Bus Name" value="" minlength="3" required="" >
            <datalist id="buslist"></datalist>
        </div>


        <div class="form-group">
            <select name="committee" class="form-control form-control-solid placeholder-no-fix">
                <?php
                if($user_level==0)
                {
                    echo "<option value=\"0\" selected=\"selected\">I am a regular student</option>";
                    echo "<option value=\"1\">I am a committee member</option>";
                }
                else if($user_level==1)
                {
                    echo "<option value=\"0\" >I am a regular student</option>";
                    echo "<option value=\"1\" selected=\"selected\">I am a committee member</option>";
                }


                ?>
            </select>
        </div>

        <div class="alert alert-success" id="success-alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong>
            Your profile was updated successfully.
        </div>

        <div id="errorMessageContent" class="content" style="display: none; color: red">
            <div id="errorMessages"></div>
        </div>

        <div class="form-actions">
            <button type="button" onclick="validateUpdate()" class="btn red btn-block" data-loading-text="Updating..">Update</button>
        </div>
    </form>

</div>

<div class="copyright">© 2017 Batfia</div>


</body>
<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script src="js/profile.js"></script>
<script type="text/javascript">
    initialize();
</script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>
