<script src="ajax.js"></script>
<?php

	// THIS FUNCTION RETURNS THE STATUS OF ISSUES
	// STATUSES ARE
	// STATUS 0- VOTING ON, 1- Solutions Awaited, 2- Solutions Available, 3-Solution Approved, 4- Reported Bogus, 5- Reported duplicate
    function status($issueid)
	{
		include 'dataBaseConn.php';
		$sql= "SELECT *FROM issue WHERE issue_id =$issueid";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['upvote_count']>=UPVOTE_THRESHOLD)
		{
			if($row['bogus_count']>BOGUS_THRESHOLD)
			{
				return 5;
			}
			else
			{
				if($row['duplicate_count']>DUPLICATE_THRESHOLD)
				{
					return 4;
				}
				else{
					if($row['approved_solution']>LIKE_THRESHOLD)
					{
						return 3;
					}
					else
					{
						if($row['solution_count']>0)

						{

							return 2;
						}
						else
						{
							return 1;
						}
					}
				}
			}
		}
		else
		{
			return 0;
		}
	}

	// FUNCTION TO LIKE A SOLUTION
	// THIS FUNCTION UPDATES LIKE COUNT & INSERT USER&SOLN TO solutionlikedetails
	function LikeCount($id,$email)
	{
		include 'dataBaseConn.php';
		$userid = getUserId($email);

		$sql=" update solution set like_count=like_count+1 where solution_id='$id'";
		$result1 = $conn->query($sql);


		$sql2="Insert into solutionlikedetails(solution_id,user_id) values($id,$userid)";
		$result2=$conn->query($sql2);
		echo "You've Liked this issue!";
	}

	// RETURNS user_id WHEN email IS PROVIDED
	function getUserId($email){
		include 'dataBaseConn.php';
		$sql = "SELECT * FROM user where user_email = '$email'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		return $row['user_id'];
	}

	// CHECKS IF USER HAS ALREADY UPVOTED AN ISSUE OR NOT
	//	RETURNS FALSE IF ALREADY UPVOTED
	// RETURNS TRUE IF NOT
    function userStatus($email,$issueid)
	{
		include 'dataBaseConn.php';
		$userid = getUserId($email);
					//echo $issueid;

		//$issueid=getIssueId($issueid);
		$sql="select * from issueupvote where user_id='$userid' And issue_id='$issueid ' ";//user session
		$result = $conn->query($sql);
		//$num_rows = mysql_num_rows($result);
		
		$n=mysqli_num_rows($result);
		
		if($n>0)
		{
			//echo "YOU HAVE ALREADY VOTED FOR THIS ";
			return false;//already upvoted
		}
		else
		{
			return true;
		}
		
		
	}

	// FUNCTION TO UPVOTE A SOLUTION
	// THIS FUNCTION UPDATES UPVOTE COUNT & INSERT USER&ISSUE TO issueupvote
	function upvotecount($issueid,$userid)
	{
		include 'dataBaseConn.php';
		$sql="update issue set upvote_count=upvote_count+1 where issue_id=$issueid";
		$result=$conn->query($sql);
		
		$sql2 = "INSERT INTO issueupvote(issue_id,user_id) values($issueid,$userid)";
		$result2=$conn->query($sql2);
		
		echo "You've successfully upvoted this issue!";
	}
	

	// RETURNS WHICH user_id OF USER WHO HAS POSTED THIS ISSUE
	function postedBy($id)
	{
		include 'dataBaseConn.php';
        $sql="select *from issue  inner join user on issue.user_id=user.user_id where issue.issue_id=$id";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        echo"<b> Posted by : </b>". $row['fname']. "  ".$row['lname'];
        
    }

	// RETURNS UPVOTE COUNT
	function NumberOfCounts($issueid)
	{
		include 'dataBaseConn.php';
		$sql1 = "SELECT * FROM issue WHERE issue_id = $issueid ";
		$result1 = $conn->query($sql1);
		$row=$result1->fetch_assoc();
		echo "<b>".$row['upvote_count']. "  users have upvoted</b>";	
	}

	// RETURN LIKE COUNT
	function NumberOfLikes($solutionid)
	{
		include 'dataBaseConn.php';
			$sql = "SELECT * FROM solution WHERE solution_id = '$solutionid' ";
			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			return $row['like_count'];
	}

	// RETURN inst_id WHEN inst_email IS PROVIDED
	function getInstId($cemail){
        include 'dataBaseConn.php';
        $sql = "SELECT inst_id FROM institute WHERE inst_email = '$cemail'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $instid = $row['inst_id'];
        }
        return $instid;
    }

	// RETURNS STATUS OF INSTITUTE
	// STATUSES ARE
	// STATUS : 0-> Institute has done nothing, 1-> It has reported it as bogus, 2-> It has reported is , 3-> Solved
	function instStatus($cemail, $issueid)
	{
		include 'dataBaseConn.php';
		$instid = getInstId($cemail);
		$sql = "SELECT * FROM issuebogusupvote WHERE inst_id = $instid AND issue_id = $issueid";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			return 1;
		}
		$sql = "SELECT * FROM issueduplicateupvote WHERE inst_id = $instid AND issue_id = $issueid";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			return 2;
		}
		$sql = "SELECT * FROM solution WHERE inst_id = $instid AND issue_id = $issueid";
		$result =$conn->query($sql);
		if($result->num_rows >= 1){
			return 3;
		}
		return 0;
	}

	// ADDS SOLUTION 
	// 	INSERTS SOLUTION DETAILS TO solution
	function provideSolution($inst_id,$issue_id,$url){
		include '../functions/dataBaseConn.php';
		$sql = "SELECT * FROM solution";
		$result = $conn->query($sql);
		$count = $result->num_rows + 1;
		$sql = "INSERT INTO solution(solution_id,issue_id,inst_id,solution_url,like_count) values($count,$issue_id,$inst_id,'$url',0)";
        if($result = $conn->query($sql))
			return true;
		else
			return false;
	}

	// REPORTS ISSUE AS BOGUS
	// INSERTS issue_id and inst_id TO issuebogusupvote
	function reportBogus($inst_id,$issue_id){
		include '../functions/dataBaseConn.php';
		$sql = "INSERT INTO issuebogusupvote(issue_id,inst_id) values($issue_id,$inst_id)";
		if($result = $conn->query($sql))
			return true;
		else
			return false;
	}
	
	// REPORT ISSUE AS DUPLICATE
	// INSERTS issue_id, inst_id, similar_to_issue to issueduplicateupvote
	function reportDuplicate($inst_id,$issue_id,$similar_to_issue){
		include '../functions/dataBaseConn.php';
		$sql = "INSERT INTO issueduplicateupvote(issue_id,inst_id,similar_to_issue) values($issue_id,$inst_id,$similar_to_issue)";
        if($result = $conn->query($sql))
			return true;
		else
			return false;
	
	}
	
function updateDuplicate($inst_id,$issue_id,$similar_to_issue){
		include '../functions/dataBaseConn.php';
		//instid1=$instid1;
		echo $issue_id;
		$sql = "Select * from issueduplicateupvote group by issue_id,similar_to_issue  having count(inst_id)>5 and similar_to_issue=$similar_to_issue";
        $result = $conn->query($sql);
		
		if($result)
		{
			//$count=$row[issue_id];
			$sql1="update issue set duplicate_count=duplicate_count+1 where issue_id=$issue_id";
			$result1= $conn->query($sql1);
		}

}


?>