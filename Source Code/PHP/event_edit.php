<?php

if (isset($_POST['SubmitEvent'])) {
	include '../Database/event_connection.php';
	$event_to_edit = $_POST['Event_ID_Value'];
	$event_date = '' . $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
	
	updateEventDetails($event_to_edit, $_POST['Event_Name'], $_POST['Event_Type'], 
										$event_date, $_POST['Event_Description']);
	
	echo "The Event has been updated.";
	
	echo '<br><br><a href="../event.php?id='.$event_to_edit.'">Go Back...</>';
	
	
}



else if(isset($_POST['SubmitImage']) && !empty($_FILES["ImageUpload"]["name"]))
{
	include '../Database/event_connection.php';
	
	$event_to_edit = $_POST['Event_ID_Value'];
	$target_name = "eventimage_" . $event_to_edit;
	$target_file = "../Images/Event/" . $target_name . ".jpg";
	$uploadOK = true;
	$replaced = false;

	/*Check if it's an image*/
	$image_check = getimagesize($_FILES["ImageUpload"]["tmp_name"]);
	if( !$image_check)
	{	
		echo "File is not an image.";
		$uploadOK = false;
	}
	
	/*Check its file type*/
	$imageFileType = pathinfo(basename($_FILES["ImageUpload"]["name"]),PATHINFO_EXTENSION);
	if(	$imageFileType != "jpg" && $imageFileType != "png" 
		&& $imageFileType != "jpeg" && $imageFileType != "gif"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" 
		&& $imageFileType != "JPEG" && $imageFileType != "GIF") 
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOK = false;
	} 
	
	
	/*Check if file exists*/
	if (file_exists($target_file))
		$replaced = true;
	
	/* Check file size*/
	if ($_FILES["ImageUpload"]["size"] > 500000){
		$uploadOK = false;
	}
	
	
	/*Upload*/
	if ($uploadOK == false) 
	{
		echo "Sorry, your file was not uploaded.";
	} 
	else 
	{
		
		if (move_uploaded_file($_FILES["ImageUpload"]["tmp_name"], $target_file)) 
		{
			if ($replaced)
				echo "The file ". basename( $_FILES["ImageUpload"]["name"]). " has overwritten the event image.";
			else
				echo "The file ". basename( $_FILES["ImageUpload"]["name"]). " has been uploaded.";
			
			updateImageEvent($event_to_edit, $target_name);
			

			echo '<br><br><a href="../event.php?id='.$event_to_edit.'">Go Back...</>';
			
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
		
	}

}
else
	echo "It was at that moment I knew... I fucked up. I FUCKED UP!"

?>