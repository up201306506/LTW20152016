<ul class="navigation_bar">
	<a class="home_icon" href="profile.php"><img src="Images/home_icon.png"></a>
	<input class="search_bar" type="text" placeholder="SEARCH EVENT">
	<li><a href="PHP/logout.php">Log Out</a></li>
	<li><a href="settings.php">Settings</a></li>
	<li><a href="profile.php">User: <?php echo $_SESSION['login_user']; ?></a></li>
</ul>
<div class="spacing"></div>