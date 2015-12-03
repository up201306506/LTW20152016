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





	<!--<a class="Text" href="#ChangeUsername">Change Username</a><br>
	<a class="Text" href="#ChangePassword">Change Password</a><br>
	<a class="Text" href="#DeleteAccount">Delete Account</a><br>
	<div id="ChangeUsername">
		<span id="message">The Event has been deleted</span>;
	</div>-->


	<form class="accordion" action="" method="post">

			<div class="accordion-section">
				<a class="accordion-section-title" href="#ChangeUsername">Change Username</a>
				<div id="ChangeUsername" class="accordion-section-content">
					<div class="new_username">
						<label for="newusername">New Username</label>
						<input id="newusername" name="newusername" type="text">
					</div>

					<div>
						<input name="submit_username" type="submit" value="Ok">
					</div>
				</div>
			</div>

			<div class="accordion-section">
				<a class="accordion-section-title" href="#ChangePassword">Change Password</a>
				<div id="ChangePassword" class="accordion-section-content">
					<div class="new_password">
						<label for="newpassword">New Password</label>
						<input id="newpassword" name="newpassword" type="text">
					</div>

					<div class="submit_password">
						<input name="submit_password" type="submit" value="Ok">
					</div>
				</div>
			</div>

			<!--<div class="accordion-section">
				<a class="accordion-section-title" href="#DeleteAccount">Delete Account</a>
				<div id="DeleteAccount" class="accordion-section-content">
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
			</div>-->
			
	</form>



</body>
</html>