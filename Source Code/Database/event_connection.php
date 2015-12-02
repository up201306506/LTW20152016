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
function existsEventByID($ID) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetchAll();
	return (!empty($result));
}
function insertIntoEvents($event_id, $user_id, $event_type, $event_description, $event_date, $image_path) {
	$db_events = new PDO('sqlite:Database/eventerer.db');
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



?>