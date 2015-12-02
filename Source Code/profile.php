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
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}
		include 'Database/event_type_connection.php';
		include 'Database/event_connection.php';
		include 'PHP/topnav.php';
		
		include "PHP/event_deletion.php";
		
	?>
	<input id="Add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton">
	<div class="eventDiv">
		<?php 
			$uservents = getEventsByUserID($_SESSION['login_user']);
			$eventtypes = getAllEventTypes();
			
			if (!empty($uservents))
			{	
				foreach($uservents as $row)
				{
					echo '<div class="eventBox">';
						echo '<h2>' . $row['event_id'] . '<h2>';
						echo '<span class="EventDescription">' . $row['description'] . '<span><br>';
						echo '<span class="EventType">' . $eventtypes[$row['type']]['type'] . '<span><br>';
						echo '<span class="EventUser"> Created by: '. $row['user_id'] . '<span><br>';
						echo '<span class="EventDate">' . $row['date'] . '<span><br>';
						echo '<span class="EventDescription">' . $row['description'] . '<span><br>';
						echo '<span class="TROCAISTOPORUMATAGimg">' . $row['image_path'] . '<span><br>';
						echo '<form action="" method="post">';
							echo "<button name='Delete_button' class='deletebutton' value='".$row['id']."'>Delete Event</button>";
						echo '</form>';
					echo '</div>';
				}
			}
		?>
	</div>
</body>
</html>