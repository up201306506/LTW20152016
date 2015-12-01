<?php

//session_start();
$error = '';

function insertIntoEvents($event_id, $user_id, $event_type, $event_description, $event_date, $image_path) {
	$db_events = new PDO('sqlite:Database/events.db');
	$stmt = $db_events->prepare('INSERT INTO events VALUES (NULL, :eventid, :user, :imagepath, :date, :description, :type)');
	$stmt->bindParam(':eventid', $event_id);
	$stmt->bindParam(':user', $user_id);
	$stmt->bindParam(':imagepath', $image_path);
	$stmt->bindParam(':date', $event_date);
	$stmt->bindParam(':description', $event_description);
	$stmt->bindParam(':type', $event_type);
	$stmt->execute();
}



if (isset($_POST['Event_Submit'])) {
	if (  /*empty($_POST['Event_image'])||*/ empty($_POST['Event_Date'])  || empty($_POST['Event_Type'])  
		 || empty($_POST['Event_Description'])   || empty($_POST['Event_Id'])) 
	{
		$error = "Form isn't complete";
	} else 
	
	{
		$event_id = $_POST['Event_Id'];
		$event_type = $_POST['Event_Type'];
		$event_description = $_POST['Event_Description'];
		$event_date = $_POST['Event_Date'];
		$image_path = "LEL";
		
		insertIntoEvents($event_id, $_SESSION['login_user'], $event_type, $event_description, $event_date, $image_path);
		
		//header("Location:index.php");
	}
}

?>