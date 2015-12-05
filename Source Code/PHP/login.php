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
		$user = getUserByUserName($username);

		if (!empty($user) &&  password_verify($password, $user['password'])) {
			$_SESSION['login_user'] = $username;
			$_SESSION['user_id'] = $user['id'];
			
			if (!isset($_SESSION['csrf_token'])) {
				$_SESSION['csrf'] = getToken(16);}
			
			echo '<script>window.location = "profile.php"</script>';
		} else {
			$error = 'Username or Password is invalid!';
		}
	}
}

?>