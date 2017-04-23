<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Login | LalBus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/favicon.png">
	<link rel="canonical" href="">
	<link rel="stylesheet" href="./css/screen.css">
	<script src="js/login_email.js"></script>
	<script src="js/main.js"></script>

	<style type="text/css">
		html {
			height: 100%;
		}
		
		.page-inner {
			display: table;
			width: 100%;
			font-family: 'Maven Pro';
		}
	</style>
</head>

<body class="login">

	<div class="logo">
		<a href=""><img style="width: 20%;" src="./img/logo-w.png?res" alt="Lalbus"></a>
	</div>



	<div class="content">

		<form class="login-form" action="#" method="POST">
			<h3 class="form-title font-dark">Login</h3>
			<br>
			<div class="form-group">
				<input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off"
					   placeholder="Email" name="email" required="">
			</div>
			<div class="form-group">
				<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
					   placeholder="Password" name="password" required="">
			</div>

            <div id="errorMessageContent" class="content" style="display: none; color: red">
                <div id="errorMessages"></div>
            </div>

			<div class="form-actions">
				<button type="button" class="btn red" onclick="validateLogin()">Login</button>
				<a class="forget-password" href="">Forgot Password?</a>
			</div>
			
			<div class="create-account">
				<p>
					<a href="signup.php">Create an account</a>
				</p>
			</div>
		</form>

	</div>

	<div class="copyright">© 2017 Batfia</div>
</body>

</html>