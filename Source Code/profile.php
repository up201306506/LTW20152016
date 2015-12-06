<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Your Profile</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/profile.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/profile.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION)) {
			header('Location: index.php');
		}
		if (empty($_GET)) {
			echo '<script>window.location = "profile.php?id=' . $_SESSION['user_id'] . '";</script>';
			exit;
		}	
		
		$owner = false;
		$userID = $_GET['id'];
		if($_GET['id'] == $_SESSION['user_id']){
			$owner = true;
		}
	
		include 'Database/event_type_connection.php';
		include 'Database/event_connection.php';
		include 'Database/user_connection.php';
		include 'PHP/topnav.php';
		include 'PHP/event_deletion.php';
		include 'PHP/event_box.php';

	if (!existsUserByID($userID)) {
		?><h1 id="ProfileUserName">There is no user with this ID</span><?php
	} else {
	?>

	<img id="ProfileUserImage" src='<?php echo "Images/Users/".getUserByID($userID)['image_path'].".jpg" ; ?>'>
	<span id="ProfileUserName"><?php echo getUserByID($userID)['user_name']; ?></span>

	<?php
	if ($owner){
	?>
		<input class="add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton">
	<?php } else { echo "<br>";} ?>

	<div class="event-container">
		<ul class="tabs">
			<li class="tab-link current" data-tab="tab-1">Created Events</li>
			<li class="tab-link" data-tab="tab-2">Attending Events</li>
		</ul>
		<div class="tab-content current" id="tab-1"><?php createdEventBox($userID, $owner); ?></div>
		<div class="tab-content" id="tab-2"><?php attendingEventBox($userID); ?></div>
	</div>
	<?php } ?>
</body>
</html>