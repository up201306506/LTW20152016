<?php

session_start();
$error = '';

if (isset($_POST['signup'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = 'Username or Password is invalid!';
	} else {
		$username = $_POST['username'];
		$password = $_POST['password'];
		insertIntoUser($username, $password);
	}
}

?>