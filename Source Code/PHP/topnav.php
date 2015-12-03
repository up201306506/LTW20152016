<ul class="navigation_bar">
	<a class="home_icon" href="profile.php"><img src="Images/home_icon.png"></a>
	<li><a href="PHP/logout.php">Log Out</a></li>
	<li><a href="settings.php">Settings</a></li>
	<li><a href="profile.php">User: <?php echo $_SESSION['login_user']; ?></a></li>
	<li><input id="search_bar" class="search_bar" type="text" placeholder="SEARCH EVENT"></li>
	<img class="lupa" src="Images/lupa.png">
</ul>
<div class="spacing"></div>