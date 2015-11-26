<?php

function getAllEvents() {
	$db_events = new PDO('sqlite:Database/events.db');
	$stmt = $db_events->prepare('SELECT * FROM events');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function getEventsByUserID($ID) {
	$db_events = new PDO('sqlite:Database/events.db');
	$stmt = $db_events->prepare('SELECT * FROM events WHERE user_id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetchAll();
	return $result;
}

?>