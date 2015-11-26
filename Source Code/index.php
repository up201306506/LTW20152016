<?php
include('login.php');
include('signup.php');

if(isset($_SESSION['login_user'])) {
	header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eventerer™</title>
	<link rel="stylesheet" type="text/css" href="Styles/index.css">
</head>
<body>
	<img src="Images/Logo2.png">
	<form action="" method="post">
		<div class="username">
			<input name="username" type="text" placeholder="USERNAME">
		</div>
		<div class="password">
			<input name="password" type="password" placeholder="PASSWORD">
		</div>
		<div class="login">
			<input name="login" type="submit" value="LOG IN">
		</div>
		<div class="signup">
			<input name="signup" type="submit" value="SIGN UP">
		</div>
	</form>
</body>
</html>