<?php

if (isset($_POST['NewComment']) && $_SESSION['csrf'] == $_POST['csrf']) {
	newComment($_POST['Event_ID'],$_POST['User_ID'],$_POST['NewCommentText']);	
}

if (isset($_POST['DeleteComment']) && $_SESSION['csrf'] == $_POST['csrf']) {
	if(checkIfCommentExists($_POST['Comment_ID']))
		deleteComment($_POST['Comment_ID']);
}

?>