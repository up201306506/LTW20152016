<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="Styles/topnav.css">
	<link rel="stylesheet" type="text/css" href="Styles/newevent.css">
	<script src="JQuery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="JQuery/newevent.js"></script>
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
		
		<form action="" method="post" enctype="multipart/form-data"> 
			<label for="Event_Id">Nome:</label><input type="text" name="Event_Id" id="Event_Id"> <br>
			<label for="Event_Description">Descrição:</label><textarea name="Event_Description" id="Event_Description"></textarea> <br> 
			<label for="Event_Type">Tipo de evento:</label>
			<select name="Event_Type" id="Event_Type">
				<option value="Festa de Anos">Festa de Anos</option>
				<option value="Concerto">Concerto</option>
				<option value="Pool Party">Pool Party</option>
				<option value="Piquenique">Piquenique</option>
				<option value="Palestras">Palestras</option>
				<option value="Jogo">Jogo</option>
			</select><br>
			<label for="Event_Date">Data:</label><input type="date" name="Event_Date" id="Event_Date"><br>
			<label for="Event_image">Imagem:</label><input type="file" name="Event_image" id="Event_image"><br>
			
			<input type="submit" name="Event_Submit"> </input>
		</form>
		
		<?php	
			include'Database/event_creation.php';
		?>
		<br>
		<span id="message">TEST</span>
		
	</div>
</body>
</html>