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

		$_SESSION['login_user'] = $username;
		$_SESSION['user_id'] = $user['id'];
		echo '<script>window.location = "profile.php"</script>';
	}
}

?>