<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>New Account | Lalbus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.png">
	<link rel="canonical" href="">
	<link rel="stylesheet" href="./css/screen.css">
	<script src="js/signup.js"></script>
	<script src="js/main.js"></script>

</head>

<body class="login">

	<div class="logo">
		<a href=""><img src="./img/logo-w.png" alt="Lalbus"></a>
	</div>

	<div id="errorMessageContent" class="content" style="display: none; color: red">
		<div id="errorMessages"></div>
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
					<input type="number" name="mob_no" class="form-control form-control-solid placeholder-no-fix"
						   placeholder="Mobile (015...)" value="" minlength="11" required="">
				</div>

			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control form-control-solid placeholder-no-fix"
					   placeholder="Password" minlength="8" required="">
			</div>


			<div class="form-group">
				<select name="bus" class="form-control form-control-solid placeholder-no-fix">
					<?php
						require_once('backend/dbconnect.php');
						// already in ?
						$sql = "SELECT * FROM bus";
						$result = $conn->query($sql);

						$total = $result->num_rows;

						for($i=0; $i<$total; $i++) {
							$row = $result->fetch_assoc();

							$id = $row["id"];
							$name = $row["name"];

							echo "<option value=$id>$name</option>";
						}
					?>
				</select>
			</div>


			<div class="form-group">
				<select name="committee" class="form-control form-control-solid placeholder-no-fix">
					<option value="0">I am a regular student</option>
					<option value="1">I am a committee member</option>
				</select>
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

</html>