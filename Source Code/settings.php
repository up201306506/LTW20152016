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
		include 'PHP/changeimage.php';
	?>
	<div class="user-pass">
		<form class="new-user-form" action="" method="post">
			<span class="title">Change Username</span>
			<div class="text">
				<label for="password1">Password:</label>
				<input type="password" id="password1" name="password1">
			</div>
			<div class="text">
				<label for="password1">New Username:</label>
				<input type="text" id="newusername" name="newusername">
			</div>
			<input type="submit" value="Submit" name="submit_username">
		</form>
		<form class="new-pass-form" action="" method="post">
			<span class="title">Change Password</span>
			<div class="text">
				<label for="password2">Old Password:</label>
				<input type="password" id="password2" name="password2">
			</div>
			<div class="text">
				<label for="newpassword">New Password:</label>
				<input type="password" id="newpassword" name="newpassword">
			</div>
			<input type="submit" value="Submit" name="submit_password">
		</form>
		
		<br>
		
		<form class="new-image-form" action="" method="post" enctype="multipart/form-data">
			<div class="fileupload">
						<label for="newimage">Upload File</label>
						<input class="ImageUpload" id="newimage" name="newimage" type="file">
					</div>
					<br>
					<div class="button">
						<input name="submit_image" type="submit" value="Ok">
			</div>
		</form>
	</div>
</body>
</html>