<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/profile.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/search.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		$search = $_GET['search-text'];
		if(empty($search))
		{
			echo '<script>window.location = "profile.php?id=' . $_SESSION['user_id'] . '";</script>';
			
		}
		include 'PHP/topnav.php';
		include 'Database/user_connection.php';
		include 'Database/event_connection.php';
		include 'Database/event_type_connection.php';
		include 'PHP/changeuser.php';
		include 'PHP/changepass.php';	
	?>
</body>
</html>