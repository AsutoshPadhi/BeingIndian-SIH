<?php

	$message = $otp;
	$headers = "From : asutosh.padhi123@gmail.com". "\r\n";
	mail($cemail, "Password for BetterIndia", $message, $headers);

?>