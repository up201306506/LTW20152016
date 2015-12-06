<?php

$error = '';

if (isset($_POST['submit_password'])) {
	if (empty($_POST['newpassword']) || empty($_POST['password2']) || 
		(!password_verify($_POST['password2'], getUserByID($_SESSION['user_id'])['password']))) 
	{
		$error = 'Password or New Password is invalid!';
	} else {
		$Userid = $_SESSION['user_id'];
		$newpassword = $_POST['newpassword'];
		$options =['cost' => strlen($_SESSION['login_user'])];
		$hashedpass = password_hash($newpassword, PASSWORD_DEFAULT, $options);
		changePassword($Userid, $hashedpass);
		echo '<script>window.location = "profile.php"</script>';
	}
}

?>