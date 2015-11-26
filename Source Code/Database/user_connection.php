<?php

function getAllUsers() {
	$db_users = new PDO('sqlite:Database/users.db');
	$stmt = $db_users->prepare('SELECT * FROM user');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function getUserByUserID($ID) {
	$db_users = new PDO('sqlite:Database/users.db');
	$stmt = $db_users->prepare('SELECT * FROM user WHERE user_id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetch();
	return $result;
}

function insertIntoUser($username, $password) {
	$db_users = new PDO('sqlite:Database/users.db');
	$stmt = $db_users->prepare('INSERT INTO user VALUES (NULL, 0, :user, :pass)');
	$stmt->bindParam(':user', $username);
	$stmt->bindParam(':pass', $password);
	$stmt->execute();
}

?>