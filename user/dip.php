<?php
	
		$userid=$_GET['userid'];
		$issueid=$_GET['issueid'];
		
		require '../functions/func_in.php';
		include '../functions/dataBaseConn.php';
		//$issueid=a();
		
		upvotecount($issueid,$userid);
		
		
	
?>