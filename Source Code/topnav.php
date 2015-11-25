<?php
	echo '<form action="list_users.php" method="get">';
		echo '<label for="username">Username:</label>';
		echo '<input type="text" id="username" name="username">';
		echo '<label for="password">Password:</label>';
		echo '<input type="password" id="password" name="password">';
		echo '<input type="submit" value="Log In">';
	echo "</form>";
?>


