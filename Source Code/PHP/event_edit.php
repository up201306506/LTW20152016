<?php

if (isset($_POST['SubmitEvent'])) {
	$event_to_edit = $_POST['Event_ID_Value'];
	
	echo "SubmitEvent<br>";
	echo $event_to_edit;
	
}
else if(isset($_POST['SubmitImage']))
{
	$event_to_edit = $_POST['Event_ID_Value'];
	$target_file = "../Images/Event/eventimage_" . $event_to_edit . ".jpg";
	$uploadOK = true;

	//$image_check = getimagesize($_FILES["ImageUpload"]["tmp_name"]);
	if( false )
		//echo "File is an image - " . $check["mime"] . ".";
	;
	else
	{	
		$uploadOK = false;
	}
	
	echo "SubmitImage<br>";
	echo $target_file;
}
else
	echo "It was at that moment I knew... I fucked up. I FUCKED UP!"

?>