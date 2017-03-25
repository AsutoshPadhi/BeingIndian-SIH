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
<?php

	//show whether voting is closed or not
	function showStatus()
	{
		include '../functions/dataBaseConn.php';

		//$state_id = 1006;
		$sql ="SELECT * FROM issue WHERE issue_id =100000";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//show and disable upvote button
		echo "<h1>Status</h1>";
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
		$sql= "SELECT *FROM issue WHERE issue_id =1.";
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
			//return 5;//voting on
			echo"voting on";
		}
	}
?>










</body>
</html>