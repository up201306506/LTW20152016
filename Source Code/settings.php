<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/settings.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/settings.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		include 'PHP/topnav.php';
		include 'Database/user_connection.php';
		include 'PHP/changeuser.php';
		include 'PHP/changepass.php';

	?>
	<form class="accordion" action="" method="post">
			<div class="accordion-section">
				<a class="accordion-section-title" href="#ChangeUsername">Change Username</a>
				<div id="ChangeUsername" class="accordion-section-content">
					<div class="text">

						<label for="password1">Password</label>
						<input class="textbox" id="password1" name="password1" type="password">
					</div>
					<br>
					<div class="text">
						<label for="newusername"><b>New Username</b></label>
						<input class="textbox" id="newusername" name="newusername" type="text">
					</div>
					<br>
					<div class="button">
						<input name="submit_username" type="submit" value="Ok">
					</div>

				</div>
			</div>

			<div class="accordion-section">
				<a class="accordion-section-title" href="#ChangePassword">Change Password</a>
				<div id="ChangePassword" class="accordion-section-content">

					<div class="text">
						<label for="password2">Password</label>
						<input class="textbox" id="password2" name="password2" type="password">
					</div>
					<br>
					<div class="text">
						<label for="newpassword">New Password</label>
						<input class="textbox" id="newpassword" name="newpassword" type="password">
					</div>
					<br>
					<div class="button">
						<input name="submit_password" type="submit" value="Ok">
					</div>

				</div>
			</div>			
	</form>
</body>
</html>