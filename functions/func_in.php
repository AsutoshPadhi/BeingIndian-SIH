<script src="ajax.js"></script>
	
<?php
define('BOGUS_THRESHOLD',5);
define('UPVOTE_THRESHOLD',5);
define('DUPLICATE_THRESHOLD',5);
define('LIKE_THRESHOLD',2);

    function status($issueid)
	{
		include '../functions/dataBaseConn.php';
		// STATUS 0- VOTING ON, 1- Solutions Awaited, 2- Solutions Available, 3-Solution Approved, 4- Reported Bogus, 5- Reported duplicate

		$sql= "SELECT *FROM issue WHERE issue_id =$issueid";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['upvote_count']>=UPVOTE_THRESHOLD)
		{
			if($row['bogus_count']>BOGUS_THRESHOLD)
			{
				
				echo "Issue marked as BOGUS ISSUE by institutes";
				return 5;
			}
			else
			{
				if($row['duplicate_count']>DUPLICATE_THRESHOLD)
				{
					echo "Issue marked as DUPLICATE ISSUE by institutes";
					return 4;
				}
				else{
					if($row['approved_solution']>LIKE_THRESHOLD)
					{
						echo "This issue has a Solution which is approved by upvoters";
						return 3;
					}
					else
					{
						if($row['solution_count']>0)

						{
							
							echo "Voting Closed- Solutions Available";
							return 2;
						}
						else
						{
							echo "Voting Closed- No solutions yet!";
							return 1;
						}
					}
				}
			}
		}
		else
		{
			echo "You can vote this issue";
			return 0;
		}
	}
	function LikeCount($id,$email)
	{
		include '../functions/dataBaseConn.php';
		 $userid = getUserId($email);
		//$sql1="select * from solution inner join solutionlikedetails on solution.solution_id=solutionlikedetails.solution_id where issue_id='$id' ";
		
		  /*  $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['issue_id'];
				 $val1=$row['solution_id'];
			}
		}*/
		
		$sql=" update solution set like_count=like_count+1 where solution_id='$id'";
          $result1 = $conn->query($sql);
		 
		
		  $sql2="Insert into solutionlikedetails (solution_id,user_id) values ('$id','$userid')";
		  $result2=$conn->query($sql2);
		  echo "YOU HAVE liked  FOR THIS ";
	}

	

	function getUserId($email){
		include '../functions/dataBaseConn.php';
		$sql = "SELECT * FROM user where user_email = '$email'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		return $row['user_id'];
	}
    function userStatus($email,$issueid)
	{
		
		include '../functions/dataBaseConn.php';
		$userid = getUserId($email);
		//$issueid=getIssueId($issueid);
		$sql="select * from issueupvote where user_id='$userid' And issue_id='$issueid ' ";//user session
		$result = $conn->query($sql);
		//$num_rows = mysql_num_rows($result);
		
		$n=mysqli_num_rows (  $result );
		
		if($n>0)
		{
			echo "YOU HAVE ALREADY VOTED FOR THIS ";
			
			//return 0;//already upvoted
		}
		else
		{
			//return 1;//not upvoted
			
			echo "<button style='margin-left: 15px' class='btn btn-primary' onclick='javascript:loadDoc(\"dip.php?issueid=$issueid&userid=$userid\",$issueid)'>Upvote</button>";
			
		}
		
		
	}
	function upvotecount($issueid,$userid)
	{
		include '../functions/dataBaseConn.php';
		$sql="update issue set upvote_count=upvote_count+1 where issue_id=$issueid";
		$result=$conn->query($sql);
		
		$sql2 = "INSERT INTO issueupvote(issue_id,user_id) values($issueid,$userid)";
		$result2=$conn->query($sql2);
		//echo "hello";
		//$row=mysqli_fetch_assoc($result2);
		//echo $row['upvote_count'];
		
		echo "YOU HAVE VOTED FOR THIS ";
		
	}
	
	function postedBy($id)
	{
        include '../functions/dataBaseConn.php';
        $sql="select *from issue  inner join user on issue.user_id=user.user_id where issue.issue_id=$id";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        echo"<b> POSTED BY : </b>". $row['fname']. "  ".$row['lname'];
        
    }
function NumberOfLikes($solutionid)
{
		include '../functions/dataBaseConn.php';
	    $sql = "SELECT * FROM solution WHERE solution_id = '$solutionid' ";
        $result = $conn->query($sql);
        echo $row['like_count'];
		
}
	function getInstId($cemail){
        require('dataBaseConn.php');
        $sql = "SELECT inst_id FROM institute WHERE inst_email = '$cemail'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $instid = $row['inst_id'];
        }
        return $instid;
    }
	function instStatus($cemail, $issueid)
	{
		// STATUS : 0-> NONE, 1-> Bogus, 2-> Duplicate, 3-> Solved
		include '../functions/dataBaseConn.php';
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
		if($result->num_rows == 1){
			return 3;
		}
		return 0;
	}

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

	function reportBogus($inst_id,$issue_id){
		include '../functions/dataBaseConn.php';
		$sql = "INSERT INTO issuebogusupvote(issue_id,inst_id) values($issue_id,$inst_id)";
		if($result = $conn->query($sql))
			return true;
		else
			return false;
	}
	
	function reportDuplicate($inst_id,$issue_id,$similar_to_issue){
		include '../functions/dataBaseConn.php';
		$sql = "INSERT INTO issueduplicateupvote(issue_id,inst_id,similar_to_issue) values($issue_id,$inst_id,$similar_to_issue)";
        if($result = $conn->query($sql))
			return true;
		else
			return false;
	}

?>