<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/profile.css">
</head>
<body>
	<?php
	session_start();
	include 'topnav.php';

	echo '<h1>Username: ' . $_SESSION['login_user'] . '</h1>';

	?>
	<a href="logout.php">Log Out</a>
</body>
</html>