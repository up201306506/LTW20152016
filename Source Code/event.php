<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Event Page</title>
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
	if (isset($_GET['id']))  {
		if (existsEventByID($_GET['id'])) {
			$this_event = getEventByID($_GET['id']);
			$eventtype = getEventsByTypeID($this_event['type']);
			
			$isOwner = false;
			if ($this_event['user_id'] == $_SESSION['user_id'])
				$isOwner = true;
			?>
				<div class="event-container">
					<span class="event-title"><?php echo $this_event['event_id'];?></span>
					<div class="event-info-container">
						<?php if(checkIfUserAttends($this_event['id'] , $_SESSION['user_id'])) {?>
						<span class="attendance">You're going!</span>
						<?php } else { ?>
						<span class="attendance">You're not going!</span>
						<?php } ?>
						<form action="" method="post">
							<input type="hidden" name="Event_ID" value="<?php echo $this_event['id']; ?>"/>
							<input type="hidden" name="User_ID" value="<?php echo  $_SESSION['user_id']; ?>"/>
							<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
							<?php if(checkIfUserAttends($this_event['id'] , $_SESSION['user_id'])) {?>
								<input class="leave-event-button" name="LeaveEvent" type="submit" value="Leave Event">
							<?php } else { ?>
								<input class="join-event-button" name="JoinEvent" type="submit" value="Join Event">
							<?php } ?>
						</form>
						<span class="event-creator">Creator: <?php echo "<a href='profile.php?id=".$this_event["user_id"]."'>".getUserByID($this_event['user_id'])['user_name']."</a>"; ?></span>
						<span class="event-type"><?php echo $eventtype['type']; ?></span>
						<span class="event-date">Date: <?php echo $this_event['date']; ?></span>
						<img class="event-image" src="Images/Event/<?php echo $this_event['image_path']; ?>.jpg"/>
						<span class="event-description-label">Description:</span>
						<p class="event-description"><?php echo $this_event['description']; ?></p>
						<span class="people-going-label">People Going(<?php echo countAttendingUsers($this_event['id']); ?>):</span>
						<p class="people-going-list">
							<?php
								$attendingusersarray = getAttendingUsers($this_event['id']);
								foreach($attendingusersarray as $row) {
									$current_username = getUserByID($row['u_id'])['user_name'];
									echo '<a class="userlink" href="profile.php?id='.$row['u_id'].'">'.$current_username.'</a> ';
								}
							?>
						</p>
						<?php if($isOwner) {?>
						<input class="event-edit-button" Onclick="location.href = 'editevent.php?id=<?php echo $this_event['id']; ?>';" type="button" value="Edit Event" name="EditEventButton">
						<?php } ?>
					</div>
				</div> 
				<div class="comments-container">
					<span class="comments-title" id="commentBoxHeader">Comments:</span>
						<?php
							$comments = getAllCommentsForEvent($this_event['id']);						
							foreach ($comments as $rows) {
								$link = '"profile.php?id=' . getUserByID($rows['u_id'])['id'] . '"';
							?>
								<div class="comment-box">
									<div class="comment-content">
										<img class="profile-image" src='<?php echo "Images/Users/" . getUserByID($rows['u_id'])['image_path'] . ".jpg";?>'>
										<a class="comment-name" href=<?php echo $link; ?>><?php echo '   '.getUserByID($rows['u_id'])['user_name'] . ': '; ?></a>
										<!-- <span class="comment-name"><?php echo '   '.getUserByID($rows['u_id'])['user_name'] . ': '; ?></span> -->
									</div>
									<span class="comment-text"><?php echo '   '.$rows['message']; ?></span>
										<?php 
											if($rows['u_id'] == $_SESSION['user_id']) {
											?>
												<form action="" method="post">
													<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
													<input type="hidden" name="Comment_ID" value="<?php echo $rows['id']; ?>"/>
													<input class="comment-delete" name="DeleteComment" type="submit" value="Delete this comment">
												</form>
											<?php 
											}
										?>
								</div>
							<?php
							}
						?>
					<form class="new-comment-form" action="" method="post">
						<input type="hidden" name="Event_ID" value="<?php echo $this_event['id']; ?>"/>
						<input type="hidden" name="User_ID" value="<?php echo  $_SESSION['user_id']; ?>"/>
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
						<textarea placeholder="Write a comment..." style="resize:none" name="NewCommentText" class="new-comment-text"></textarea>
						<input class="new-comment-submit" name="NewComment" type="submit" value="Publish Comment">
					</form>
				</div>
			<?php
		} else {
			?>
				<h3>No event exists on this page.</h3>
				<span id='message'>But you may create an event if you wish to do so - <input class="add_event" Onclick="location.href = 'newevent.php';" type="button" value="Add Event" name="AddEventButton"></span>
			<?php
		}
	} else {
		header('Location: index.php');
	}
	?>
	
</body>
</html>