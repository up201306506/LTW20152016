<?php
	
function getAllEventTypes() {
	$db_types = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_types->prepare('SELECT * FROM event_types');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}
function getEventsByTypeID($ID) {
	$db_types = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_types->prepare('SELECT * FROM event_types WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetch();
	return $result;
}

?>