<?php

if (isset($_POST['Delete_button'])) {
	$event_to_delete = $_POST['Delete_button'];
	if (existsEventByID($event_to_delete))	
	{
		$event_name =  deleteEvent($event_to_delete);
		echo '<span id="message">The Event has been deleted</span>';
	}
	
}

?>