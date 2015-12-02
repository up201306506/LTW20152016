<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/settings.css">
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		include 'PHP/topnav.php';
	?>
</body>
</html>