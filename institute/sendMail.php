<?php

	$message = "This works";
	$headers = "From : asutosh.padhi123@gmail.com". "\r\n";
	mail("ashutosh_padhi1@yahoo.in", "test 2", $message, $headers);

	echo "Working?";

?>