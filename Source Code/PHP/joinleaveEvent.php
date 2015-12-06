<?php

if (isset($_POST['LeaveEvent'])  && $_SESSION['csrf'] == $_POST['csrf']) {
	if(checkIfUserAttends($_POST['Event_ID'] , $_POST['User_ID']))
		leaveEvent($_POST['Event_ID'], $_POST['User_ID']);	
}
if (isset($_POST['JoinEvent'])  && $_SESSION['csrf'] == $_POST['csrf']) {
	if(!checkIfUserAttends($_POST['Event_ID'] , $_POST['User_ID']))
		insertAttend($_POST['Event_ID'], $_POST['User_ID']);
}

?>