<?php

//session_start();
$error = '';

if (isset($_POST['submit_username'])) {
	if (empty($_POST['newusername'])) {
		echo "2";
		$error = 'Username is invalid!';
	} else {
		$username = $_SESSION['login_user'];
		$newusername = $_POST['newusername'];
		changeUsername($username, $newusername);
	}
}

?>