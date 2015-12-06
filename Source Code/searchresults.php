<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/tabs.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/searchresults.css">
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
		include 'PHP/search.php';
	?>
	<div class="search-container">
		<ul class="tabs">
			<li class="tab-link current" data-tab="tab-1">Events</li>
			<li class="tab-link" data-tab="tab-2">Users</li>
		</ul>
		<div class="tab-content current" id="tab-1"><?php getSearchedEvents($search); ?></div>
		<div class="tab-content" id="tab-2"><?php getSearchedUsers($search); ?></div>
	</div>
</body>
</html>