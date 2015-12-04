<?php

function newComment($eventID, $userID, $content){
	$db_comments = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_comments->prepare('INSERT INTO comments VALUES (NULL, :user, :event, :content)');
	$stmt->bindParam(':user', $userID);
	$stmt->bindParam(':event', $eventID);
	$stmt->bindParam(':content', $content);
	$stmt->execute();
	
}
function deleteComment($commentID){
	$db_comments = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_comments->prepare('PRAGMA foreign_keys = ON;');
	$stmt = $db_comments->prepare('DELETE FROM comments WHERE id = :ID');
	$stmt->bindParam(':ID', $commentID);
	$stmt->execute();
}
function getAllCommentsForEvent($eventID) {
	$db_comments = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_comments->prepare('SELECT * FROM comments WHERE e_id = ?');
	$stmt->execute(array( $eventID));
	$result = $stmt->fetchAll();
	return $result;
}
function getAllComments() {
	$db_comments = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_comments->prepare('SELECT * FROM comments');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}
function checkIfCommentExists($ID){
}


?>