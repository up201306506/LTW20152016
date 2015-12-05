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
		include 'Database/comment_connection.php';
		include 'PHP/joinleaveEvent.php';
		include 'PHP/addremoveComment.php';
		include 'PHP/topnav.php';
		
	?>
	
	<?php
	if (isset($_GET['id'])) 
	{
		if (existsEventByID($_GET['id']))
		{
			$this_event = getEventByID($_GET['id']);
			$eventtype = getEventsByTypeID($this_event['type']);
			
			$isOwner = false;
			if ($this_event['user_id'] == $_SESSION['user_id'])
				$isOwner = true;
			
			?>
				<div class="eventBox">
					<h1><?php echo $this_event['event_id'];?></h1>
					<?php if(checkIfUserAttends($this_event['id'] , $_SESSION['user_id'])) {?>
						<span class="YoureAttending">You're going!</span>
					<?php } else { ?>
						<span class="YoureNotAttending">You're not going!</span>
					<?php } ?>
						<form action="" method="post">
							<input type="hidden" name="Event_ID" value="<?php echo $this_event['id']; ?>"/>
							<input type="hidden" name="User_ID" value="<?php echo  $_SESSION['user_id']; ?>"/>
							<?php if(checkIfUserAttends($this_event['id'] , $_SESSION['user_id'])) {?>
								<input name="LeaveEvent" type="submit" value="Leave Event">
							<?php } else { ?>
								<input name="JoinEvent" type="submit" value="Join Event">
							<?php } ?>
						</form>
						<br>
					<span class="EventCreator"> Creator: <?php echo "<a href='profile.php?id=".$this_event["user_id"]."'>".getUserByID($this_event['user_id'])['user_name']."</a>"; ?></span><br>
					<span class="EventType"> <?php echo $eventtype['type']; ?></span><br>
					<span class="EventDate"> Date: <?php echo $this_event['date']; ?></span><br>
					<img class="EventImg" src="Images/Event/<?php echo $this_event['image_path']; ?>.jpg"/><br>
					
					<span class="EventDescription"> Description: <?php echo $this_event['description']; ?></span><br>
					
					<span class="EventShowUpsLabel"> People Going(<?php echo countAttendingUsers($this_event['id']); ?>):</span>
					<span class="EventShowUps">
					<?php
						$attendingusersarray = getAttendingUsers($this_event['id']);
						foreach($attendingusersarray as $row)
						{
							$current_username = getUserByID($row['u_id'])['user_name'];
							echo '<a class="userlink" href="profile.php?id='.$row['u_id'].'">'.$current_username.'</a> ';
						}	
						
					?></span><br>
					
					<?php if($isOwner) {?> 				
						<input class="EditEventButton" Onclick="location.href = 'editevent.php?id=<?php echo $this_event['id']; ?>';" type="button" value="Edit Event" name="EditEventButton">
					<?php } ?>			
				</div> 
				<br>
				<div class="commentBox">
				<span id="commentBoxHeader">Comments:</span> <br>
					<?php 
						$comments = getAllCommentsForEvent($this_event['id']);						
						foreach ($comments as $rows)
						{
							
							?>
								<div class="usercomment_box">
								<span class="usercomment_name"><?php echo '   '.getUserByID($rows['u_id'])['user_name'] . ': '; ?></span>
								<span class="usercomment_text"><?php echo '   '.$rows['message']; ?></span>
								<?php 
									if($rows['u_id'] == $_SESSION['user_id'])
									{
										?>
										<form action="" method="post">
											<input type="hidden" name="Comment_ID" value="<?php echo $rows['id']; ?>"/>
											<input name="DeleteComment" type="submit" value="Delete this comment">
										</form>
										<?php 
									}
								?>
								</div>
							<?php
							
						}
					?>
				<form action="" method="post">
					<input type="hidden" name="Event_ID" value="<?php echo $this_event['id']; ?>"/>
					<input type="hidden" name="User_ID" value="<?php echo  $_SESSION['user_id']; ?>"/>
					<textarea style="resize:none" name="NewCommentText" class="NewCommentText"></textarea>
					<input name="NewComment" type="submit" value="New Comment">
				</form>
				</div>
			<?php
		}
		else
		{
			?>
				<h3>No event exists on this page.</h3>
				<span id='message'>But you may create an event if you wish to do so - <input class="add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton"></span>
			
		
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