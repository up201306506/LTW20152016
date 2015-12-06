<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Event Editor</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/editevent.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		
		include 'Database/event_connection.php';
	?>
	<?php
	if (isset($_GET['id'])) 
	{
		if (existsEventByID($_GET['id']))
		{
			$this_event = getEventByID($_GET['id']);			
			if (!($this_event['user_id'] == $_SESSION['user_id']))
				header('Location: index.php');
			
		include 'Database/user_connection.php';
		include 'PHP/dateAndType.php';	
		include 'PHP/topnav.php';
		
		$eventtype = getEventsByTypeID($this_event['type']);
		
		?>

		<form class="edit-container" action="PHP/event_edit.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
			<div class="edit-form">
				<span class="title">Edit Event</span>
					<input type="hidden" name="Event_ID_Value" value="<?php echo $this_event['id']; ?>">
				<span>Change Name</span>
					<input class="event-name" type="text" name="Event_Name" id="Event_Name">
				<span>Change Description</span>
					<textarea class="event-description" type="text" name="Event_Description" id="Event_Description"></textarea>
				<span>Change Type</span>
				<select class="event-type" name="Event_Type" id="Event_Type">
					<?php
						$type_list = getAllEventTypes();
						foreach ($type_list as $options)
						{
							echo "<option value='".$options['id']."'>".$options['type']."</option>";
						}
					?>
				</select>
				<span>Change Date</span>
				<div class="event-date">
					<select name="day" class="day"><?php dayOptions(); ?></select>
					<select name="month" class="month"><?php monthOptions(); ?></select>
					<select name="year" class="year"><?php yearOptions(); ?></select>
				</div>
				<span>Change Image</span>
					<input class="choose-file" type="file" name="ImageUpload" id="ImageUpload">
					<input class="submit-file" type="submit" value="Submit Image" name="SubmitImage">
			</div>
			<div class="buttons">
				<input class="change-event-button" type="submit" value="Change Event Details" name="SubmitEvent">
				<input class="NavigationButton" Onclick="location.href = 'event.php?id=<?php echo $_GET['id'] ;?>';" type="button" value="Go Back" name="GoBackButton">
			</div>
		</form>

		<?php
		}
		else
		{
			header('Location: index.php');
		}
	}
	else
	{
		header('Location: index.php');
	}
	
	?>
	
</body>
</html>