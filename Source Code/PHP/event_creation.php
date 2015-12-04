<?php

$once = true;

if (isset($_POST['Event_Submit']) and $once == true) {
	if (empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year']) || empty($_POST['type'])  
		|| empty($_POST['description']) || empty($_POST['id'])) {
	?>
		<script>
			$(function(){
	        showMessage("Form is not complete...");
		});
		</script>
	<?php

	} else {
		$event_id = $_POST['id'];
		$event_type = $_POST['type'];
		$event_description = $_POST['description'];
		$event_day = $_POST['day'];
		$event_month = $_POST['month'];
		$event_year = $_POST['year'];
		$image_path = "eventimage_default";
		
		insertIntoEvents($event_id, $_SESSION['user_id'], $event_type, $event_description, $event_day, $event_month, $event_year, $image_path);
		
		$once = false;
	
	?>
		<script>
			$(function(){
			showMessage("Event Created. Redirecting...");
		});	
		</script>
	<?php
		echo '<script>window.location = "profile.php"</script>';
	}
}
	
?>