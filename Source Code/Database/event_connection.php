<?php

function getAllEvents() {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}
function getEventsByUserID($ID) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE user_id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetchAll();
	return $result;
}
function getEventsUserAttends($User_ID) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE id in (SELECT e_id FROM user_attends_event WHERE u_id = ?)');
	$stmt->execute(array($User_ID));
	$result = $stmt->fetchAll();
	return $result;
}
function existsEventByID($ID) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetchAll();
	return (!empty($result));
}
function getEventByID($ID) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetch();
	return $result;
}
function insertIntoEvents($event_id, $user_id, $event_type, $event_description, $event_day, $event_month, $event_year, $image_path) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$event_date = $event_year . '-' . $event_month . '-' . $event_day;
	$stmt = $db_events->prepare('INSERT INTO events VALUES (NULL, :eventid, :user, :imagepath, :date, :description, :type)');
	$stmt->bindParam(':eventid', $event_id);
	$stmt->bindParam(':user', $user_id);
	$stmt->bindParam(':imagepath', $image_path);
	$stmt->bindParam(':date', $event_date);
	$stmt->bindParam(':description', $event_description);
	$stmt->bindParam(':type', $event_type);
	$stmt->execute();
}
function deleteEvent($event_primary_id){
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('DELETE FROM events WHERE id = ?');
	$stmt->execute(array($event_primary_id));
}

/*Must be accessed from withint the PHP folder*/
function updateImageEvent($eventID, $value) {
	$db_events = new PDO('sqlite:../Database/eventerer.db');
	$stmt = $db_events->prepare('UPDATE events SET image_path = :value WHERE id = :eventID');
	$stmt->bindParam(':eventID', $eventID);
	$stmt->bindParam(':value', $value);
	$stmt->execute();
}

?>