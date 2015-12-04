<ul class="nav">
	<li class="home-icon">
		<a href="#"><img src="Images/home_icon.png"></a>
	</li>
	<li class="user-options">
		<a href="#">User: <?php echo $_SESSION['login_user']; ?></a>
		<ul class="subnav">
			<li><a href="#">Settings</a></li>
			<li><a href="#">Log Out</a></li>
		</ul>
	</li>
	<li class="search-bar">
		<form action="searchbar.php" method="get">
			<input type="text" name="search-text" class="search-text" placeholder="Search Event or User...">
			<input type="submit" name="search-button" class="search-button">
		</form>
	</li>
</ul>