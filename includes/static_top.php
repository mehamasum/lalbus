<style>
.button__badge {
background-color: #fa3e3e;
    border-radius:50%;
color: white;

padding: 1px 3px;
font-size: 10px;

position: absolute; /* Position the badge within the relatively positioned button */
top: 0;
right: 0;
}

</style>

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
    $pos_repu=$row['pos_repu'];
    $neg_repu=$row['neg_repu'];
    $repu=$pos_repu-$neg_repu;
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
                    <?php
                        echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                        if($repu>-10)
                        {
                            echo " <li id=\"page_edit\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" >Edit
                            <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"edit_bus\">Edit Bus Route</a></li>
                                    <li><a href=\"edit_schedule\">Edit Bus Schedule</a></li>
                                    <li><a href=\"edit_stoppage\">Edit Bus Stoppage</a></li>
                                </ul>
                            </li>";
                        }
/*                        if($level==0)
                           echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                        else if($level==1)
                        {
                            echo "<li id=\"page_schedule\"><a href=\"schedule\">Schedules</a></li>";
                            echo "<li id=\"page_edit\"><a href=\"edit_schedule\">Edit Schedule</a></li>";
                        }*/

                        if($level==2)
                        {
                            echo " <li id=\"page_authorization\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" >Verify
                            <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"member_auth\">Verify Members</a></li>
                                    <li><a href=\"bus_auth\">Verify Bus</a></li>
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
                            <li><a href="following">Following</a></li>
                            <li><a href="profile">Edit Profile</a></li>
                            <li><a href="update_password.php">Change Password</a></li>
                            <li><a href='mailto:lalbus.du@gmail.com'>Contact Us</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
<!--                        <span class="button__badge">2</span>-->
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
                    <li><a href="mailto:lalbus.du@gmail.com">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" >
                    <li id="page_user"><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php }
?>




