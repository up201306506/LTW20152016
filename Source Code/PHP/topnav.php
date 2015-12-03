<ul>
	<a class="home_icon" href=""><img src="Images/home_icon.png"></a>
	<input class="search_bar" type="text" placeholder="PESQUISA">
	<div class="wrapper">
		<li><a href="PHP/logout.php">Log Out</a></li>
		<li><a href="settings.php">Settings</a></li>
		<li><a href="profile.php">User: <?php echo $_SESSION['login_user']; ?></a></li>
	</div>
</ul>