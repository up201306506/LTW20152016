<?php

//session_start();
$error = '';

if (isset($_POST['submit_password'])) {
	if (empty($_POST['newpassword']) || empty($_POST['password2']) || (getUserByID($_SESSION['user_id'])['password'] != $_POST['password2'])) {
		$error = 'Password or New Password is invalid!';
	} else {
		$Userid = $_SESSION['user_id'];
		$newpassword = $_POST['newpassword'];
		changePassword($Userid, $newpassword);
		header("Location:profile.php");
	}
}

?>