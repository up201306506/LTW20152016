<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
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
	<div class="search-container">
		<ul class="tabs">
			<li class="tab-link current" data-tab="tab-1">Events</li>
			<li class="tab-link" data-tab="tab-2">Users</li>
		</ul>
		<div class="tab-content current" id="tab-1">
			<?php
				$allevents = getAllEvents();
				$eventypes = getAllEventTypes();
				if (!empty($allevents))
				{	
					foreach($allevents as $row)
					{
						if(strpos(strtolower($row['event_id']),strtolower($search)) !== false)
						{

							$creator = getUserByID($row['user_id']);
							echo '<div class="searchBox">';
								echo '<a href="event.php?id=' . $row['id'] . '"><span>' . $row['event_id'] . '<span></a><br>';
								echo '<span class="EventType">' . $eventypes[$row['type']]['type'] . '<span><br>';
								echo '<span class="EventUser"> Created by: '. $creator['user_name'] . '<span><br>';
								echo '<span class="EventDate">' . $row['date'] . '<span><br>';
								echo '<img src="Images/Event/'.$row['image_path'].'.jpg" alt="image_'.$row['event_id'].'" class="event_image"/>';
								echo '<form action="" method="post">';
								echo '</form>';
							echo '</div>';
						}
					}
				}
			?>
		</div>
		<div class="tab-content" id="tab-2">
			<?php
				$allusers = getAllUsers();
				if (!empty($allusers))
				{
					foreach($allusers as $row)
					{
						if(strpos(strtolower($row['user_name']),strtolower($search)) !== false)
						{
							echo '<div class="searchBox">';
								echo '<span> Username: '. $row['user_name'] . '<span><br>';
							echo '</div>';
						}	
					}	
				}
			?>
		</div>
	</div>
</body>
</html>