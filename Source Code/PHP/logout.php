<?php

session_start();
if (session_destroy()) {
	header("refresh:3; url=../index.php");
	echo '<span id="message">Logged out Successfully. Redirecting to Main Page...</span>';
	
}

?>