<?php

session_start();
if (session_destroy()) {
	echo	'<span id="message">Logged out Successfully. Redirecting to Main Page...</span>';
	
	header("refresh:3; url=../index.php");
}

?>