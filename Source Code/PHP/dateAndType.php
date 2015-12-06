<?php

include 'Database/event_type_connection.php' ;

$global = getdate();
$months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

function dayOptions() {
	for ($i = 1; $i < 32; $i++)
		echo '<option>' . $i . '</option>';
}

function monthOptions() {
	$ms = $GLOBALS['months'];
	foreach ($ms as $month) {
		echo '<option>' . $month . '</option>';
	}
}

function yearOptions() {
	$g = $GLOBALS['global'];
	for ($i = $g['year']; $i < $g['year'] + 1001; $i++)
		echo '<option>' . $i . '</option>';
}

function typeOptions() {
	$type_list = getAllEventTypes();
	foreach ($type_list as $options)
		echo '<option value="' . $options['id'] . '">' . $options['type'] . '</option>';
}

?>