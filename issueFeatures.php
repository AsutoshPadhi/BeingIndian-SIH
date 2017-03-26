<?php

	include '../functions/dataBaseConn.php';
	function showStatus($variable)
	{
		

		$state_id = 1006;
		$sql = $variable//;"SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//echo "test";
		//echo "".$row['upvote_count'];
		
		//show and disable upvote button
		if($row['upvote_count']>=500)
		{
			return 1;//voting close
		}
		else
		{
			return 0;//upvote button
		}
		//see solution
		if($row['solution_count']>0)
		{
			return 2;
		}
		else 
		{
			return 0;//solution Awaited
		}
	}
	function collegeStatus($variable)
	{
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
	
	function status($variable)
	{
		//$state_id = 1006;
		$sql =$variable // "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['uovote_count']>=500)
		{
			
			if($row['approved_solution']>0)
			{
				return 1;//status approved
			}
			else
				if($row['solution_count']>0)
				
				{
					return 2;
				}
				else
					if($row['dupicate_count']>1)
					{
						return 3;
					}
				else
					if($row['bogus_count']>5)
					{
						return 4;
					}
				else
					return 0;//solution awaited
			
				
		}
		else
		{
			return 5;//voting on
		}
	}
?>