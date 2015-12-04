<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
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
		<div id="EditBox">
			<form action="PHP/event_edit.php" method="post" enctype="multipart/form-data">
				
				<input type="hidden" name="Event_ID_Value" value="<?php echo $this_event['id']; ?>"/>
				
				<label for="Event_Name">Change Name:</label>
					<input type="text" name="Event_Name" id="Event_Name"><br>
					
				<label for="Event_Type">Change Type:</label>
					<select name="Event_Type" id="Event_Type">
						<?php
							$type_list = getAllEventTypes();
							foreach($type_list as $options)
							{
								echo "<option value='".$options['id']."'>".$options['type']."</option>";
							}
						?>
					</select><br>
					
				<label for="Event_Date">Change Date:</label>
					<select name="day" class="day"><?php dayOptions(); ?></select>
					<select name="month" class="month"><?php monthOptions(); ?></select>
					<select name="year" class="year"><?php yearOptions(); ?></select><br>
					
				<label for="Event_Description">Change Description:</label><br>
					<textarea type="text" name="Event_Description" id="Event_Description"></textarea><br>
				<input type="submit" value="Change Event Details" name="SubmitEvent"><br><br>		
				
					
				<label for="ImageUpload">Change Image:</label>
					<input type="file" name="ImageUpload" id="ImageUpload"><br>
				<input type="submit" value="Change Image" name="SubmitImage"><br>	
			</form>
		</div>
		
		
		
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