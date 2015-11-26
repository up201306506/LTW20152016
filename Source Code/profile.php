<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eventerer™</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/profile.css">
</head>
<body>
	<?php include 'topnav.php'; ?>
	<div class=User Info>
		<?php 
			$username = $_GET['Username_Input'];
			include 'Database/user_connection.php';
			$user = getUserByID($username);
						
			if (empty($user))
				echo "EMPTY";
			else
				echo '<p id="username">' . 'USERNAME:' . $user['user_id'] . '</p>';

			
		?>
	</div>
</body>
</html>