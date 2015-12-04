<?php

if (isset($_POST['LeaveEvent'])) {
	if(checkIfUserAttends($_POST['Event_ID'] , $_POST['User_ID']))
		echo "Fuck you";
	
}
if (isset($_POST['JoinEvent'])) {
	if(!checkIfUserAttends($_POST['Event_ID'] , $_POST['User_ID']))
		insertAttend($_POST['Event_ID'], $_POST['User_ID']);
}

?>