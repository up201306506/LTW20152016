<?php

if (isset($_POST['NewComment'])) {
	newComment($_POST['Event_ID'],$_POST['User_ID'],$_POST['NewCommentText']);	
}
if (isset($_POST['DeleteComment'])) {
	if(checkIfCommentExists($_POST['Comment_ID']))
		deleteComment($_POST['Comment_ID']);
		
}


?>