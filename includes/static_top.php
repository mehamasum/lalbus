<?php
if(session_id() == '') {
    session_start();
}

if(isset($_SESSION['id'])) { ?>
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
                    <li id="page_home" class="active"><a href="home.php">Home</a></li>
                    <li id="page_following"><a href="following.php">Following</a></li>
                    <li id="page_schedule"><a href="schedule.php">Schedules</a></li>
                    <li id="page_stat"><a href="#">Monthly Stats</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['name']?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="schedule.php">Schedules</a></li>
                    <li><a href="#" data-type='help' data-toggle='modal' data-target='#myModal'>Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php }
?>




