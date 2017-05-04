<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>New Account | Lalbus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
	<link rel="canonical" href="">
	<link rel="stylesheet" href="./css/screen.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/static_top.css">

</head>

<script src="js/bus_list.js"></script>

<body class="login" onload="bus_initialize('bus')">
<?php include("includes/static_top.php"); ?>
	<div class="logo">
		<a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
	</div>

	<div class="content">

		<form class="login-form" action="#" method="POST">
			<h3 class="form-title font-dark">New Account</h3>
			<br>
			<div class="form-group">
				<input type="text" name="name" class="form-control form-control-solid placeholder-no-fix"
					   placeholder="Name" value="" minlength="3" maxlength="64" required="">
			</div>

			<div class="form-group">
				<input type="number" name="reg_no" class="form-control form-control-solid placeholder-no-fix"
					   placeholder="DU Reg No (2017812...)" value="" required="">
			</div>

            <div class="form-group">
                <div>
                    <input type="email" name="email" class="form-control form-control-solid placeholder-no-fix"
                           placeholder="Email (abc..@...)" value="" minlength="3" required="">
                </div>

            </div>


            <div class="form-group">
				<input type="password" name="password" class="form-control form-control-solid placeholder-no-fix"
					   placeholder="Password" value="" minlength="8" required="">
			</div>


			<div class="form-group">
				<select name="bus" class="form-control form-control-solid placeholder-no-fix">
				</select>
			</div>


			<div class="form-group">
				<select name="committee" class="form-control form-control-solid placeholder-no-fix">
					<option value="0">I am a regular student</option>
					<option value="1">I am a committee member</option>
				</select>
			</div>

            <div class="alert alert-success" id="success-alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Success! </strong>
                Signed Up successful. Please check your email for verification.
            </div>


            <div id="errorMessageContent" class="content" style="display: none; color: red">
                <div id="errorMessages"></div>
            </div>

			<div class="form-actions">
				<button type="button" onclick="validateSignUp()" class="btn red btn-block" data-loading-text="Registering..">Register</button>
			</div>
			<div class="create-account">
				<p>
					<a href="login.php">Login with an existing account</a>
				</p>
			</div>
		</form>

	</div>

	<div class="copyright">© 2017 Batfia</div>

    </body>

<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>
<script src="js/signup.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</html>