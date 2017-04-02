<!--upcount middle page for calling upvotecount function -->
<?php
	
	$email=$_GET['userid'];
	$issueid=$_GET['issueid'];
	require '../functions/func_in.php';
	include '../functions/dataBaseConn.php';
	
	upvotecount($issueid,$email);
	
?>