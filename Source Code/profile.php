<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/profile.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/profile.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		include 'Database/event_type_connection.php';
		include 'Database/event_connection.php';
		include 'Database/user_connection.php';
		include 'PHP/topnav.php';
		include 'PHP/event_deletion.php';
		include 'PHP/event_box.php';
	?>
	<input class="add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton">
	<div class="event-container">
		<ul class="tabs">
			<li class="tab-link current" data-tab="tab-1">Created Events</li>
			<li class="tab-link" data-tab="tab-2">Attending Events</li>
		</ul>
		<div class="tab-content current" id="tab-1"><?php createdEventBox(); ?></div>
		<div class="tab-content" id="tab-2"><?php attendingEventBox(); ?></div>
	</div>
</body>
</html>