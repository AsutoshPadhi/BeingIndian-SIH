<?php
	include('dataBaseConn.php');

	//user

	$votedByMe = 
	SELECT user.fname,user.lname ,issue.title FROM user INNER JOIN issueupvote inner join issue on user.user_id=issueupvote.user_id and issue.issue_id=issueupvote.issue_id WHERE issueupvote.user_id='$row['user_id']';//user_id is fetched using a particular user's session
	$toupvote=
	update issue set upvote_count=upvote_count+1 where issue_id=$row['issue'] and  title=$row['title'];
	$addedissue = 
	INSERT into issue(issue_id,user_id,added_on,district_id,region_id,locality,pincode,title,description,upvote_couNT,bogus_count,duplicate_count,solution_count) values();
	$search = select title from issue where title like '%".$_POST['']."%';

	$addedbyme=
	select issue.title from issue inner join user on issue.user_id=user.user_id where  user_email="$_SESSION['']";

	$sendEmail=
	select issue.issue_id,user.user_email,issue.title from issue inner join issueupvote inner join user on issue.issue_id=issueupvote.issue_id and user.user_id=issueupvote.user_id where issue.bogus_count>5;

  $approvedSolution=
  select * from solution where 1;
  if("$['like_count']">500) 
  {
  	update issue set approvedSolution=1 where issue_id="$row['issue_id']";
  }

  $aa=
  SELECT *  FROM district INNER JOIN state ON district.state_id=state.state_id;
  $state=$_POST['textstate'];
  SELECT district_name FROM district INNER JOIN state ON district.state_id=state.state_id where state_name="$state";

  $solutionCount=
  select count(issue.issue_id)as solution_count,issue.title from issue INNER JOIN solution on solution.issue_id=issue.issue_id group by issue.title having issue.issue_id="$row['issue_id']";

  $solutionDisplay=
  select solution_url from solution where issue_id="$row['issue_id']";


	//institute
	$proinLoc=
	SELECT issue.title,institute.inst_name,issue.district_id FROM issue INNER JOIN district INNER JOIN institute ON  district.district_id=issue.district_id and district.district_id=institute.district_id where  institute.inst_email="2015isha.shetty@ves.ac.in" ;//in location of college

	$reportedBogusByme = 
	select issue.title,issue.id,institute.inst_name  from issue inner join institute inner join issuebogusupvote on issue.issue_id=issuebogusupvote.issue_id and institute.inst_id=issuebogusupvote.inst_id where bogus_count>5;

	
	$reportedDuplicateByMe = 
    select issue.title,issueduplicateupvote.issue_id,issueduplicateupvote.inst_id,issueduplicateupvote.similar_to_issue,user.user_email from issueduplicateupvote inner join issue inner join user on issue.issue_id=issueduplicateupvote.issue_id and user.user_id=issue.user_id where issue.duplicate_count>0;

	$solvedByMe = 
	select solution.solution_url,institute.inst_name,issue.title from solution inner join institute INNER JOIN issue on institute.inst_id=solution.inst_id and issue.issue_id=solution.issue_id WHERE issue.solution_count>0; 

	$voteAsbogus=
	update issue set bogus_count=bogus_count+1 where issue_id="$row['issue_id']";

	$voteAsduplicate=
	update issue set duplicate_count=duplicate_count+1 where issue_id="$row['issue_id']";

	$postSolution=
	insert into solution(solution_id, issue_id, inst_id, solution_url, like_count, added_on) values(,"$row['issue_id']",,"$var");

	$likeCount=
   select * from solutionlikedetails where 1;
   update solution set like_count=like_count+1 where solution_id="$row[solution_id]";



?>

