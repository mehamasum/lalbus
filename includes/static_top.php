<?php
if(session_id() == '') {
    session_start();
}

if(isset($_SESSION['id'])) {
    include_once ('./backend/dbconnect.php');
    $user = $_SESSION['id'];
    $sql = "select * from users WHERE id=$user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $level=$row['level'];
    $status=$row['status'];
    ?>
    <nav class="navbar navbar-lalbus navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand"> <img src="./img/logo-w.png" width="120px"></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="page_home" class="active"><a href="home">Home</a></li>
                    <li id="page_report"><a href="report.php">Report Location</a></li>
                    <li id="page_following"><a href="following">Following</a></li>
                    <?php
                        if($level==0)
                           echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                        else if($level==1)
                        {
                            echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                            echo "<li id=\"page_admin_schedule\"><a href=\"admin_schedule\">Edit Schedule</a></li>";
                        }
                        else if($level==2)
                        {
                            echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                            echo "<li id=\"page_admin_schedule\"><a href=\"admin_schedule\">Edit Schedule</a></li>";
                            echo "<li id=\"page_member_authorization\"><a href=\"member_auth\">Verify Members</a></li>";
                        }
                    ?>

                    <li id="page_stoppage"><a href="search">Search Bus</a></li>
                    <li id="page_stat"><a href="#">Monthly Stats</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo $_SESSION['name'];
                                if($status==1)
                                    echo " [Unverified]";
                            ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile">Profile</a></li>
                            <li><a href="change_password">Change Password</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php }
else { ?>
    <nav class="navbar navbar-lalbus navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand"> <img src="./img/logo-w.png" width="120px"></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home">Home</a></li>
                    <li><a href="schedule">Schedules</a></li>
                    <li><a href="search">Search Bus</a></li>
                    <li><a href="#" data-type='help' data-toggle='modal' data-target='#myModal'>Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php }
?>




