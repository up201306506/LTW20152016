<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/event.css">
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
		include 'Database/user_connection.php';
		include 'Database/event_connection.php';
		include 'PHP/topnav.php';
		
	?>
	
	<?php
	if (isset($_GET['id'])) 
	{
		if (existsEventByID($_GET['id']))
		{
			$this_event = getEventByID($_GET['id']);
			$eventtype = getEventsByTypeID($this_event['type']);
			
			?>
				<div class="eventBox">
					<h1><?php echo $this_event['event_id'];?></h3>
					<span class="EventCreator"> Creator: <?php echo getUserByID($this_event['user_id'])['user_name']; ?></span><br>
					<span class="EventType"> <?php echo $eventtype['type']; ?></span><br>
					<span class="EventDate"> Date: <?php echo $this_event['date']; ?></span><br>
					<img class="EventImg" src="Images/Event/<?php echo $this_event['image_path']; ?>.jpg"/><br>
					
					<span class="EventDescription"> Descripion: <?php echo $this_event['description']; ?></span><br>
					
					<form action="PHP/imageupload.php" method="post" enctype="multipart/form-data">
						<label for="ImageUpload">Change Image:</label>
						<input type="file" name="ImageUpload" id="ImageUpload">
						<input type="submit" value="Upload Image" name="submit">
					</form>
					
					<input class="EditEventButton" Onclick="location.href = 'editevent.php';" type="button" value="Edit Event" name="EditEventButton">
	
							
				</div>
			<?php
		}
		else
		{
			?>
				<h3>No event exists on this page.</h3>
				<p>But you may create an event if you wish to do so - <input class="add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton">
	</p>
			
		
			<?php
			
		}
	}
	else
	{
		header('Location: index.php');
	}
	?>
	
</body>
</html>