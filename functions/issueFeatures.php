<!--<?php

	/*include '../functions/dataBaseConn.php';
	function showStatus()
	{
		

		$state_id = 1006;
		$sql = "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo "test";
		echo "".$row['upvote_count'];*/
//	}

?>-->


<!doctype html>
<html>
<head>
</head>
<body>
<form>
<input type="submit" name="class" value="click me" onclick="f1()">
</form>
<?php

define('bogus_threshold',5);
define('upvote_threshold',500);
define('like_threhold',100);

	//show whether voting is closed or not
	function showStatus()
	{
		include '../functions/dataBaseConn.php';

		//$state_id = 1006;
		$sql ="SELECT * FROM issue WHERE issue_id =100000";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//show and disable upvote button
		
		/*if($row['upvote_count']>=500)
		{
			echo "voting close";
		}
		else
		{
			echo "upvote button";
		}*/
		echo "<br>";
		//see solution button
		if($row['solution_count']>0)
		{
		     echo "solution available";
		}
		else 
		{
			echo "solution Awaited";
		}
	}


	function historyadd($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result->fetch_assoc())
				{

					echo $row['title'];
	
				}
		}
		
	}


	function historyUpvote($sql)
	{
		
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result->fetch_assoc())
				{

					echo $row['title'];
	
				}
		}
		
	}
		
	}


	function collegeStatus($variable)
	{
		include '../functions/dataBaseConn.php';
		$sql="select * from issuebogusupvote where inst_id=' ' And isuue_id=  ";
		$result = $conn->query($sql);
		if($result==TRUE)
		{
		     return 1;	//status bogus
		}
		$sql="select * from issueduplicateupvoteupvote where inst_id=' ' And isuue_id=  ";
		$result = $conn->query($sql);
		if($result==TRUE)
		{
			return 2;  //status marked duplicate
		}
		
	}


	function userStatus($variable)
	{
		include '../functions/dataBaseConn.php';
		$sql= $variable;//"select * from issueupvote where user_id=   ";//user session
		$result = $conn->query($sql);
		if($result==TRUE)
		{
			return 0;//already upvoted
		}
		else
		{
			return 1;//not upvoted
		}
		
	}
	

	function status()
	{
		include '../functions/dataBaseConn.php';
		//$state_id = 1006;
		//$sql =$variable; 

		$sql= "SELECT *FROM issue WHERE issue_id =1";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['uovote_count']>=500)
		{
			
			if($row['approved_solution']>0)
			{
				echo "Solution approved";
			}
			else
				if($row['solution_count']>0)
				
				{
					echo "  solutions are available";
				}
				else
					if($row['dupicate_count']>1)
					{
						echo "Issue marked as duplicte";
					}
				else
					if($row['bogus_count']>5)
					{
						//return 4;
						echo "bogus issue";
					}
				else
					//return 0;//solution awaited
				echo "Solution awaited";
			
				
		}
		else
		{

			echo "voting on";//voting on

		}
	}
	
	//institute
	function addSolution($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		$sql1="select * fom solution where 1";
		$result1 = $conn->query($sql1);
		echo "Solution addded";
		
	
	}


	function f()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution where 1";
		$result1 = $conn->query($sql1);
		echo "Solution addded";
		if($result1->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result1->fetch_assoc())
				{
	               $val=$row['solution_id'];
				}
				return $val;
		}

	}
	

function f1()
	{
		include '../functions/dataBaseConn.php';
		$sql="select * from  issue where 1";
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		$name=$_POST['class'];
		if($result->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result->fetch_assoc())
				{
					
					$issue_id1=$row['issue_id'];
				}
				return $issue_id1;
		}
		
	}


	function CountBogus($sql)
	{
		include '../functions/dataBaseConn.php';

		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result->num_rows!=0)
			{
			while($row = $result->fetch_assoc())
				{
	               $val=$row['bogus_count'];
	           }
	       }
		
	}


	function ApprovedSolution($sql)
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution where 1";
		if($result1->num_rows!=0)
		{
			while($row = $result1->fetch_assoc())
			{
				$val=$row['like_count'];
			}
		}
		if($val>500) 
       {
  	//update issue set approvedSolution=1 where issue_id="$row['issue_id']";
  	         $result= $conn->query($sql);
       }


	}


	function SolutionCount()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from issue where 1";
		$result1= $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result1->num_rows!=0)
		{
			while($row = $result1->fetch_assoc())
			{
				$val=$row['title'];
			}
		}

		$sql=" select count(issue.issue_id)as solution_count,issue.title from issue INNER JOIN solution on solution.issue_id=issue.issue_id group by issue.title HAVING issue.title='$val'";
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result->num_rows!=0)
			{
			while($row = $result->fetch_assoc())
			{ 
				echo $row['solution_count'];

			}
		}


	}


	function ReportedBogus($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
	    if($result->num_rows!=0)
			{
			while($row = $result->fetch_assoc())
				{
	               $val=$row['title'];
				   echo $val ;
				}
				
		}
		
	}


	function ReportedDuplicateByMe($sql)
	{
			include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['title'];
				   $val1=$row['similar_to_issue'];
				   echo $val ."<br>" .$val1;
				}
				
			}
	}


	function proLogin($sql)
	{
		include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['inst_name'];
				  // $val1=$row['similar_to_issue'];
				   echo $val ;
				}
				
			}
	}


	function solvedByMe($sql)
	{
		include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['inst_name'];
				   $val1=$row['solution_url'];
				  // $val1=$row['similar_to_issue'];
				   echo $val."<br>".$val1; ;
				}
				
			}
	}


	function voteAsDuplicate($sql)
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from issue where 1";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['issue_id'];
				 //  $val1=$row['solution_url'];
				}
			}
			 $result = $conn->query($sql);
	}


	function voteAsBogus()
	{
        include '../functions/dataBaseConn.php';
		$sql1="select * from issue where 1";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['issue_id'];
			}
		}
		$sql="update issue set bogus_count=bogus_count+1 where issue_id='$val";
		$result = $conn->query($sql);

		
	}


	function voteAsDuplicate()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from issue where 1";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['issue_id'];
			}
		}
		$sql="update issue set duplicate_count=duplicate_count+1 where issue_id='$val";
		$result = $conn->query($sql);

	}


	function postedsolution($date,$url)
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution where 1";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['issue_id'];
				 $val1=$row['solution_id'];
			}
		}
		
		sql="insert into solution(solution_id, issue_id, inst_id, solution_url, like_count, added_on) values('$val1'+1,'$val',,$url,,$date)";
		$result = $conn->query($sql);

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

	function numberOfLikes()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution inner join solutionlikedetails on solution.solution_id=solutionlikedetails.solution_id ";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
			{
				 $val=$row['title'];
				 $val1=$row['solution_id'];
			}
			$sql="  select count(solution.solution_id)as like_count,issue.title from issue INNER JOIN solution on solution.issue_id=issue.issue_id group by issue.title having issue.title='$val'";
             $result1 = $conn->query($sql);
			if($result1->num_rows!=0)
			{
	
			while($row = $result1->fetch_assoc())
			{
				 $val=$row['like_count'];
			}
			return $val;
		}
	}
	?>

</body>
</html>