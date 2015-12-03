function showMessage($text) {
	$("#message").html($text);
	$("#message").show().delay(3000).fadeOut();
}