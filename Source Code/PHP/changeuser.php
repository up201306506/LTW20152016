<?php

//session_start();
$error = '';

if (isset($_POST['submit_username'])) {
	if (empty($_POST['newusername'])) {
		echo "2";
		$error = 'Username is invalid!';
	} else {
		$Userid = $_SESSION['user_id'];
		$newusername = $_POST['newusername'];
		changeUsername($Userid, $newusername);
		$_SESSION['login_user'] = $newusername;
		header("Location:profile.php");
	}
}

?>