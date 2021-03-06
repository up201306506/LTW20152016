<?php

function getAllUsers() {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('SELECT * FROM user');
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function getUserByID($ID) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('SELECT * FROM user WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetch();
	return $result;
}

function existsUserByID($ID) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('SELECT * FROM user WHERE id = ?');
	$stmt->execute(array($ID));
	$result = $stmt->fetchAll();
	return (!empty($result));
}

function getUserByUserName($name) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('SELECT * FROM user WHERE user_name = ?');
	$stmt->execute(array($name));
	$result = $stmt->fetch();
	return $result;
}

function existsUserByName($name) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('SELECT * FROM user WHERE user_name = ?');
	$stmt->execute(array($name));
	$result = $stmt->fetchAll();
	return (!empty($result));
}

function insertIntoUser($username, $password) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('INSERT INTO user VALUES (NULL, 0, :user, :pass, "userimage_default")');
	$stmt->bindParam(':user', $username);
	$stmt->bindParam(':pass', $password);
	$stmt->execute();
}

function changeUsername($userid, $newusername) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('UPDATE user SET user_name = :new_user_name WHERE id = :user_name');
	$stmt->bindParam(':user_name', $userid);
	$stmt->bindParam(':new_user_name', $newusername);
	$stmt->execute();
}

function changePassword($userid, $newpassword) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('UPDATE user SET password = :new_password WHERE id = :user_id');
	$stmt->bindParam(':user_id', $userid);
	$stmt->bindParam(':new_password', $newpassword);
	$stmt->execute();
}

function changeUserImage($userid, $newimage) {
	$db_users = new PDO('sqlite:Database/eventerer.db');
	$stmt = $db_users->prepare('UPDATE user SET image_path = :new_image WHERE id = :user_id');
	$stmt->bindParam(':user_id', $userid);
	$stmt->bindParam(':new_image', $newimage);
	$stmt->execute();
}
?>