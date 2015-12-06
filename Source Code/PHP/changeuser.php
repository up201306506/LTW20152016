<?php

$error = '';

if (isset($_POST['submit_username'])) {
	if (empty($_POST['newusername']) || empty($_POST['password1']) || 
		(!password_verify($_POST['password1'], getUserByID($_SESSION['user_id'])['password']))) 
	{
		$error = 'Username is invalid!';
	} else {
		$Userid = $_SESSION['user_id'];
		$newusername = $_POST['newusername'];
		if (existsUserByName($newusername))
		{
			echo '<span class="message">Username "' . $newusername . '" is already taken!</span>';
			exit;
		}
		
		changeUsername($Userid, $newusername);
		$_SESSION['login_user'] = $newusername;
		echo '<script>window.location = "profile.php"</script>';
	}
}

?>