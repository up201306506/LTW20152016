<?php
include ('PHP/crypto.php');
include('PHP/login.php');

if(isset($_SESSION['login_user'])) {
	header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eventerer</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/accordion.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/index.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<img src="Images/Logo2.png">
	<form class="accordion" action="" method="post">
		<div class="accordion-section">
			<a class="accordion-section-title" href="#Login">Log In</a>
			<div id="Login" class="accordion-section-content">
				<div class="username">
					<input id="usernamefocus1" name="username_login" type="text" placeholder="USERNAME">
				</div>
				<div class="password">
					<input name="password_login" type="password" placeholder="PASSWORD">
				</div>
				<div class="login">
					<input name="login" type="submit" value="LOG IN">
				</div>
			</div>
		</div>
		<div class="accordion-section">
			<a class="accordion-section-title" href="#Signup">Sign Up</a>
			<div id="Signup" class="accordion-section-content">
				<div class="username">
					<input id="usernamefocus2" name="username_signup" type="text" placeholder="USERNAME">
				</div>
				<div class="password">
					<input name="password_signup" type="password" placeholder="PASSWORD">
				</div>
				<div class="signup">
					<input name="signup" type="submit" value="SIGN UP">
				</div>
			</div>
		</div>
	</form>
	<?php include('PHP/signup.php'); ?>
</body>
</html>