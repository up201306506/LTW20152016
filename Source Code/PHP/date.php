<?php

$global = getdate();
$months = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

function dayOptions() {
	$g = $GLOBALS['global'];
	if ($g['mon'] == 1 || $g['mon'] == 3 || $g['mon'] == 5 || $g['mon'] == 7 || $g['mon'] == 8 || $g['mon'] == 10 || $g['mon'] == 12) {
		for ($i = 1; $i < 32; $i++)
			echo '<option>' . $i . '</option>';
	} else {
		for ($i = 1; $i < 31; $i++)
			echo '<option>' . $i . '</option>';
	}
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

?>