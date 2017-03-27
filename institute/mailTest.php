<?php

	require_once '../vendor/autoload.php';
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		->setUsername('asutosh.padhi123@gmail.com')
		->setPassword('mailHackathon');

	$swift = Swift_Mailer::newInstance($transport);

	$content = "Your temporary password is ".$otp;

	$message = \Swift_Message::newInstance("Test Mail")
			->setFrom(['asutosh.padhi123@gmail.com'=>'Support'])
			->setTo([$cemail=>'Support'])
			->setBody($content,'text/html')
			->addPart(strip_tags($content),"text/plain");

	$swift->send($message);

?>