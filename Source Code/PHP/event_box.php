<?php

function createdEventBox() {
	$userevents = getEventsByUserID($_SESSION['user_id']);
	$eventtypes = getAllEventTypes();
				
	if (!empty($userevents)) {	
		foreach($userevents as $row) {
			$creator = getUserByID($row['user_id']);
			$link = '"event.php?id=' . $row['id'] . '"';

			$alt = '"image_' . $row['event_id'] . '"';
			$imgPath = '"Images/Event/' . $row['image_path'] . '.jpg"';

			$value = '"' . $row['id'] . '"';
			?>

			<div class="event_box">
				<a class="event_id" href=<?php echo $link; ?>><?php echo $row['event_id']; ?></a>
				<span class="event_type"><?php echo $eventtypes[$row['type']]['type']; ?></span>
				<span class="event_user">Created by: <?php echo $creator['user_name']; ?></span>
				<span class="event_date"><?php echo $row['date']; ?></span>
				<img class="event_img" src=<?php echo $imgPath; ?> alt=<?php echo $alt; ?>>
				<form action="" method="post">
					<button name="Delete_button" class="delete_button" value=<?php echo $value; ?>>Cancel Event</button>
				</form>
			</div>

			<?php
		}
	}
}

function attendingEventBox() {
	$userattendance = getEventsUserAttends($_SESSION['user_id']);
	$eventtypes = getAllEventTypes();
	
	if (!empty($userattendance)) {
		foreach($userattendance as $row) {
			$creator = getUserByID($row['user_id']);
			$link = '"event.php?id=' . $row['id'] . '"';

			$alt = '"image_' . $row['event_id'] . '"';
			$imgPath = '"Images/Event/' . $row['image_path'] . '.jpg"';

			$value = '"' . $row['id'] . '"';
			?>

			<div class="event_box">
				<a class="event_id" href=<?php echo $link; ?>><?php echo $row['event_id']; ?></a>
				<span class="event_type"><?php echo $eventtypes[$row['type']]['type']; ?></span>
				<span class="event_user">Created by: <?php echo $creator['user_name']; ?></span>
				<span class="event_date"><?php echo $row['date']; ?></span>
				<img class="event_img" src=<?php echo $imgPath; ?> alt=<?php echo $alt; ?>>
			</div>

			<?php
		}
	}
}

?>