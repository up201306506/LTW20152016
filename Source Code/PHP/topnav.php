<?php

echo '<div class="navigation">';
	echo '<img id="topnavimg" src="Images/logo2.png">';
	echo '<div class="Information">';
		echo '<span id="topnavusername">Username: ' . $_SESSION['login_user'] . '</span>';
		echo '<a href="PHP/logout.php">Log Out</a>';
		echo '<a href="PHP/settings.php">Settings</a>';
	echo '</div>';
echo '</div>';
echo '<div class="navSpacing"></div>';

?>