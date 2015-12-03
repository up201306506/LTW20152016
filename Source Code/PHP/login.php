<?php

include 'Database/user_connection.php';
session_start();
$error = '';

if (isset($_POST['login'])) {
	if (empty($_POST['username_login']) || empty($_POST['password_login'])) {
		$error = 'Username or Password is invalid!';
	} else {
		$username = $_POST['username_login'];
		$password = $_POST['password_login'];
		$user = getUserByUserID($username);

		if (!empty($user) && $user['password'] == $password) {
			$_SESSION['login_user'] = $username;
			$_SESSION['user_id'] = $user['id'];
			header('Location: profile.php');
		} else {
			$error = '1Username or Password is invalid!';
		}
	}
}

?>