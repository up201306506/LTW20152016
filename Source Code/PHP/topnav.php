<ul class="navigation_bar">
	<a class="home_icon" href="profile.php"><img src="Images/home_icon.png"></a>
	<li><a href="PHP/logout.php">Log Out</a></li>
	<li><a href="settings.php">Settings</a></li>
	<li><a href="profile.php">User: <?php echo $_SESSION['login_user']; ?></a></li>
	<li>
		<form class="search_form" action="searchbar.php" method="get">
			<input name="search_bar" class="search_bar" type="text" placeholder="SEARCH">
			<button class="lupa" type="submit"></button>
		</form>
	</li>
</ul>
<div class="spacing"></div>