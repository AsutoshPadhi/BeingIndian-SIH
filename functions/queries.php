<?php
	include('dataBaseConn.php');
$bogus_threshold=5;
$upvote_threshold=500;
$like_threhold=100;
	//user
//history
	$votedByMe = 
	SELECT * FROM user INNER JOIN issueupvote inner join issue on user.user_id=issueupvote.user_id and issue.issue_id=issueupvote.issue_id WHERE issueupvote.user_id='$row['user_id']';//user_id is fetched using a particular user's session
	$toupvote=
	update issue set upvote_count=upvote_count+1 where issue_id=$row['issue'] and  title=$row['title'];
	$addedissue = 
	INSERT into issue(issue_id,user_id,added_on,district_id,region_id,locality,pincode,title,description,upvote_couNT,bogus_count,duplicate_count,solution_count) values();
	$search = select title from issue where title like '%".$_POST['']."%';

	$addedbyme=
	select * from issue inner join user on issue.user_id=user.user_id where  user_email="$_SESSION['']";

	$sendEmail=
	select * from issue inner join issueupvote inner join user on issue.issue_id=issueupvote.issue_id and user.user_id=issueupvote.user_id where issue.bogus_count>5;

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
  
  $displayissues="select * from issue where district_id='$row['district_id']'";
  
 // $displayLoc="select * from region inner join districtsinregion on region.region_id=district.region_id where district_id='$row[]'";
 //display
 $displayLocIssues="select * from issue inner join district on issue.district_id=district.district_id where district.state_id=1 and district.district_id=3 and issue.region_id=501 or issue.pincode=421202"; 
  
  $displaystateIssues="select * from issue inner join district on issue.district_id=district.district_id where district.state_id=1 and district.district_id=3";//display according to district and state

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

