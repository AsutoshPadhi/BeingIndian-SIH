<script src="ajax.js"></script>
	
<?php
	
    function status($id)
	{
		include '../functions/dataBaseConn.php';
		//$state_id = 1006;
		//$sql =$variable; 

		$sql= "SELECT *FROM issue WHERE issue_id =$id";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['upvote_count']>=500)
		{
			
			if($row['approved_solution']>0)
			{
				echo "Solution approved";
				//return 1;
			}
			else
				if($row['solution_count']>0)
				
				{
					
					echo "  solutions are available";
					//return 2;
				}
				else
					if($row['duplicate_count']>1)
					{
						echo "Issue marked as duplicte";
						//return 3;
					}
				else
					if($row['bogus_count']>5)
					{
						
						echo "bogus issue";
						//return 4;
					}
				else
					//solution awaited
					echo "Solution awaited";
					//return 0;
			
				
		}
		else
		{
			//return 5;

			echo "voting on";//voting on

		}
	}
	function LikeCount()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution inner join solutionlikedetails on solution.solution_id=solutionlikedetails.solution_id ";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['issue_id'];
				 $val1=$row['solution_id'];
			}
		}
		$sql=" update solution set like_count=like_count+1 where solution_id='$val1'";
          $result1 = $conn->query($sql);
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

	function getInstId($cemail){
        require('dataBaseConn.php');
        $sql = "SELECT inst_id FROM institute WHERE inst_email = '$cemail'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $instid = $row['inst_id'];
        }
        return $instid;
    }


?>