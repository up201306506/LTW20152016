<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/newevent.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/newevent.css">
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
		include 'PHP/dateAndType.php';
	?>
	<form class="form-container" action="" method="post">
		<div class="form">
			<span class="title">New Event</span>
			<span>Name:</span>
			<input type="text" name="id" class="id">
			<span>Description:</span>
			<textarea name="description" class="description"></textarea>
			<span>Type of event:</span>
			<select name="type" class="type"><?php typeOptions(); ?></select>
			<span>Date:</span>
			<div class="container">
				<div class="date">
					<select name="day" class="day"><?php dayOptions(); ?></select>
					<select name="month" class="month"><?php monthOptions(); ?></select>
					<select name="year" class="year"><?php yearOptions(); ?></select>
				</div>
			</div>
		</div>
		<input type="submit" value="Submit" name="Event_Submit" class="event_submit">
	</form>
	<?php
		include 'Database/event_connection.php';
		include'PHP/event_creation.php';
	?>
	<br>
	<span id="message"></span>
</body>
</html>