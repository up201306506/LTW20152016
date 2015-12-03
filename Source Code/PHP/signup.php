<?php

//session_start();
$error = '';

if (isset($_POST['signup'])) {
	if (empty($_POST['username_signup']) || empty($_POST['password_signup'])) {
		$error = 'Username or Password is invalid!';
	} else {
		$username = $_POST['username_signup'];
		$password = $_POST['password_signup'];
		insertIntoUser($username, $password);
	}
}

?>