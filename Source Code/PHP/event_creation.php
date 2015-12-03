<?php

$once = true;

if (isset($_POST['Event_Submit']) and $once == true) {
	if ( empty($_POST['Event_Date'])  || empty($_POST['Event_Type'])  
		 || empty($_POST['Event_Description'])   || empty($_POST['Event_Id'])) 
	{
	?>
		<script>
		$(function(){
        showMessage("Form is not complete...");
		});
		
		</script>
	<?php
		
	} else 
	
	{
		$event_id = $_POST['Event_Id'];
		$event_type = $_POST['Event_Type'];
		$event_description = $_POST['Event_Description'];
		$event_date = $_POST['Event_Date'];
		$image_path = "eventimage_default";
		
		insertIntoEvents($event_id, $_SESSION['login_user'], $event_type, $event_description, $event_date, $image_path);
		
		$once = false;
		header("refresh:3; url=profile.php");
	
		?>
			<script>
			$(function(){
			showMessage("Event Created. Redirecting...");
			});			
			</script>
		 <?php
	
	}
}
	

?>