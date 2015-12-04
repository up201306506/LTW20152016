<?php

if (isset($_POST['NewComment'])) {
	newComment($_POST['User_ID'],$_POST['Event_ID'],$_POST['NewCommentText']);	
}


?>