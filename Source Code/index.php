<?php
include('login.php');

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
	<img src="Images/logo.png">
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
		<div class="register">
			<input name="register" type="submit" value="REGISTER">
		</div>
	</form>
</body>
</html>