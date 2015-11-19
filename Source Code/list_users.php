<?php

$db = new PDO("sqlite:Database/users.db");

$stmt = $db->prepare('SELECT * FROM user WHERE id = 1');
$stmt->execute();
$result = $stmt->fetch();

?>

<h1>Users:</h1>
<ul>
	<li>Nome:<?=$result['user_id']?></li>
	<li>Password:<?=$result['password']?></li>
</ul>