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
                    <li id="page_following"><a href="following">Following</a></li>

                    <?php
                        echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                        echo " <li id=\"page_edit_schedule\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" >Edit
                            <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"edit_schedule\">Edit Bus Route</a></li>
                                    <li><a href=\"edit_schedule\">Edit Bus Schedule</a></li>
                                    <li><a href=\"edit_stoppage\">Edit Bus Stoppage</a></li>
                                </ul>
                            </li>";
/*                        if($level==0)
                           echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                        else if($level==1)
                        {
                            echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                            echo "<li id=\"page_edit_schedule\"><a href=\"edit_schedule\">Edit Schedule</a></li>";
                        }*/

                        if($level==2)
                        {
                            echo " <li id=\"page_member_authorization\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" >Verify
                            <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"member_auth\">Verify Members</a></li>
                                    <li><a href=\"schedule_auth\">Verify Schedule</a></li>
                                    <li><a href=\"stoppage_auth\">Verify Stoppages</a></li>
                                </ul>
                            </li>";
                        }
                    ?>

                    <li id="page_stoppage"><a href="search">Search By Stoppage</a></li>
                    <!--<li id="page_stat"><a href="#">Monthly Stats</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="page_user">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                            <?php echo $_SESSION['name'];
                                if($status==1)
                                    echo " [Unverified]";
                            ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile">Profile</a></li>
                            <li><a href="update_password.php">Change Password</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="logout.php">Logout</a></li>
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
                    <li id="page_home" class="active"><a href="index">Home</a></li>
                    <li id="page_schedule"><a href="schedule">Schedules</a></li>
                    <li id="page_stoppage"><a href="search">Search By Stoppage</a></li>
                    <li><a href="#" data-type='help' data-toggle='modal' data-target='#myModal'>Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" >
                    <li id="page_user"><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php }
?>




