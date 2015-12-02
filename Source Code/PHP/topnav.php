<?php

echo '<div class="navigation">';
	echo '<img id="topnavimg" src="Images/logo2.png">';
	echo '<div class="Information">';
		echo '<span> Username:</span>';
		echo '<a class="topnavtext" href="profile.php">'. $_SESSION['login_user'] . '</a>';
		echo '<a class="topnavtext" href="PHP/settings.php">Settings</a>';
		echo '<a  class="topnavtext" href="PHP/logout.php">Log Out</a>';
	echo '</div>';
echo '</div>';
echo '<div class="navSpacing"></div>';

?>