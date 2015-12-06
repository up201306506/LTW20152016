<?php

if (isset($_POST['Delete_button'])) {
	$event_to_delete = $_POST['Delete_button'];
	if (existsEventByID($event_to_delete) && $_SESSION['csrf'] == $_POST['csrf'])	
	{
		$event_name =  deleteEvent($event_to_delete);
	}
	
}

?>