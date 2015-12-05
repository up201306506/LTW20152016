<?php

if (isset($_POST['submit_image']) && !empty($_FILES["newimage"]["name"]) ) 
{
	$user_to_edit = $_SESSION['user_id'];
	$target_name = "userimage_" . $user_to_edit;
	$target_file = "Images/Users/" . $target_name . ".jpg";
	$uploadOK = true;
		
	/*Check if it's an image*/
	$image_check = getimagesize($_FILES["newimage"]["tmp_name"]);
	if( !$image_check)
	{
		$uploadOK = false;
		echo "notimage";
	}
	
	/*Check its file type*/
	$imageFileType = pathinfo(basename($_FILES["newimage"]["name"]),PATHINFO_EXTENSION);
	if(	$imageFileType != "jpg" && $imageFileType != "png" 
		&& $imageFileType != "jpeg" && $imageFileType != "gif"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" 
		&& $imageFileType != "JPEG" && $imageFileType != "GIF") 
	{
		$uploadOK = false;
		echo "wrong type";
	}
	
	/* Check file size*/
	if ($_FILES["newimage"]["size"] > 500000){
		$uploadOK = false;
		echo "2big";
	}
	
	/*Upload*/
	if ($uploadOK) 		
		if (move_uploaded_file($_FILES["newimage"]["tmp_name"], $target_file))
			changeUserImage($user_to_edit, $target_name);
		
	echo '<script>window.location = "profile.php"</script>';
}


?>