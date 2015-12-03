<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/newevent.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/newevent.css">
	<link href='https://fonts.googleapis.com/css?family=Jura:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION))
		{
			header('Location: index.php');
		}

		include 'PHP/topnav.php';
	?>
		<h3>Add New Event</h3>
		
		<form action="" method="post"> 
			<label for="Event_Id">Nome:</label><input type="text" name="Event_Id" id="Event_Id"> <br>
			<label for="Event_Description">Descrição:</label><textarea name="Event_Description" id="Event_Description"></textarea> <br> 
			<label for="Event_Type">Tipo de evento:</label>
			<select name="Event_Type" id="Event_Type">
				<?php include 'Database/event_type_connection.php' ;
				$type_list = getAllEventTypes();
				foreach($type_list as $options)
				{
					echo "<option value='".$options['id']."'>".$options['type']."</option>";
				}
				?>
			</select><br>
			<label for="Event_Date">Data:</label><input type="date" name="Event_Date" id="Event_Date"><br>
			
			<input type="submit" name="Event_Submit"> </input>
		</form>
		
		<?php	
			include 'Database/event_connection.php';
			include'PHP/event_creation.php';
		?>
		<br>
		<span id="message"></span>
		
	</div>
</body>
</html>