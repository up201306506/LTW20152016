<?php
	echo '<form action="list_users.php" method="get">';
		echo '<label for="username">Username:</label>';
		echo '<input type="text" id="username" name="username"><br>';
		echo '<label for="password">Password:</label>';
		echo '<input type="password" id="password" name="password"><br>';
		echo '<input type="submit" value="Log In">';
	echo "</form>";
?>


