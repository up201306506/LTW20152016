<?php

include 'Database/user_connection.php';
include 'Database/event_connection.php';

function getSearchedEvents($search) {
	$found = false;
	$allevents = getAllEvents();

	if (!empty($allevents)) {
		foreach ($allevents as $row) {
			if (strpos(strtolower($row['event_id']), strtolower($search)) !== false) {
				$found = true;
				$link = '"event.php?id=' . $row['id'] . '"';
				?> <a class="event-link" href=<?php echo $link; ?>><?php echo $row['event_id']; ?></a> <?php
			}
		}
	} else {
		?> <span class="no-results">There are no events avaiable at the moment.</span> <?php
	}

	if (!empty($allevents) && $found == false) {
		?> <span class="no-results">There were no events found with the word "<?php echo $search; ?>".</span> <?php
	}
}

function getSearchedUsers($search) {
	$found = false;
	$allusers = getAllUsers();
	
	if (!empty($allusers)) {
		foreach($allusers as $row) {
			if(strpos(strtolower($row['user_name']), strtolower($search)) !== false) {
				$found = true;
				$link = '"profile.php?id=' . $row['id'] . '"';
				?> <a class="user-link" href=<?php echo $link; ?>><?php echo $row['user_name']; ?></a> <?php
			}	
		}	
	}

	if ($found == false) {
		?> <span class="no-results">There were no users found with the word "<?php echo $search; ?>".</span> <?php
	}
}

?>