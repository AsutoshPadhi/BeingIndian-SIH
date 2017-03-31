<?php
	
		
		$solutionid=$_GET['solutionid'];
		$email=$_GET['useremail'];
		require '../functions/func_in.php';
		include '../functions/dataBaseConn.php';
		//$issueid=a();
echo $solutionid."".$email;
		
		LikeCount($solutionid,$email);
		
		
		
	
?>