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

		include 'topnav.php';

		echo '<h1>Username: ' . $_SESSION['login_user'] . '</h1>';
	?>
	
	
	<div class="EventDiv">
		<?php 
			include 'Database/event_connection.php';
			$uservents = getEventsByUserID($_SESSION['login_user']);
			
			if (!empty($uservents))
			{	
				foreach($uservents as $row)
				{
					echo '<div class="EventBox">';
							echo '<h2>' . $row['event_id'] . '<h2>';
							echo '<span class="EventDescription">' . $row['description'] . '<span><br>';
							echo '<span class="EventType">' . $row['type'] . '<span><br>';
							echo '<span class="EventUser"> Created by: '. $row['user_id'] . '<span><br>';
							echo '<span class="EventDate">' . $row['date'] . '<span><br>';
							echo '<span class="EventDescription">' . $row['description'] . '<span><br>';
							echo '<span>E ainda tem uma imagem!<span>';
					echo '</div>';
				}
			}
		?>
	</div>
	
</body>
</html>