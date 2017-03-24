<?php
	include('dataBaseConn.php');

	//user

	$votedByMe = 
	SELECT issue.title FROM issue INNER JOIN issueupvote on issue.issue_id=issueupvote.issue_id WHERE issueupvote.user_id=$_SESSION['LOGIN_USER'];//Session name
	$toupvote=
	update issue set upvote_count=upvote_count+1 where issue_id=$row['issue'] title=$row['title'];
	$addedByMe = 
	INSERT into issue(issue_id,user_id,added_on,district_id,region_id,locality,pincode,title,description,upvote_couNT,bogus_count,duplicate_count,solution_count) values();
	$search = select title from issue where title like '%".$_POST['']."%'";
	$upvotedbyme=
	select title from issue where





	//institute

	$reportedBogusByme = "SELECT";
	$reportedDuplicateByMe = "SELECT";
	$solvedByMe = "SELECT";

?>