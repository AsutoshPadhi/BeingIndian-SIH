<?php
	include('dataBaseConn.php');

	//user

	$upvotedByMe = "SELECT";
	SELECT issue.title FROM issue INNER JOIN issueupvote on issue.issue_id=issueupvote.issue_id WHERE issueupvote.user_id=$_SESSION['LOGIN_USER'];//Session name
	$addedByMe = "SELECT";
	$search = "SELECT";


	//institute

	$reportedBogusByme = "SELECT";
	$reportedDuplicateByMe = "SELECT";
	$solvedByMe = "SELECT";

?>