<?php

$error = '';

if (isset($_POST['signup'])) {
	if (empty($_POST['username_signup']) || empty($_POST['password_signup'])) {
		$error = 'Username or Password is invalid!';
	} else {
		$username = $_POST['username_signup'];
		$password = $_POST['password_signup'];
		$options =['cost' => strlen($username)];
		$hashedpass = password_hash($password, PASSWORD_DEFAULT, $options);
		insertIntoUser($username, $hashedpass);
		
		$user = getUserByUserName($username);
		session_start();
		
		$_SESSION['login_user'] = $username;
		$_SESSION['user_id'] = $user['id'];
		
		if (!isset($_SESSION['csrf_token'])) {
				$_SESSION['csrf'] =getToken(16);}
		
		echo '<script>window.location = "profile.php"</script>';
	}
}

?>