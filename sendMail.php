<?php

	$message = "This works";
	$headers = "From : asutosh.padhi123@gmail.com". "\r\n";
	mail("asutosh.padhi123@gmail.com", "test 2", $message, $headers);

	echo "Working?";

?>