<?php
	
	include('queries.php');
	include('dataBaseConn.php');
	
	function issueStatus()
	{
		$state_id = 1006;
		$sql = "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo "test";
		echo "".$row['upvote_count'];
		
		
		$sql = "SELECT * from issue where 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row["upvote_count"]>=500)
			{
				return 0; //display voting closed 
			}
			else
			{
				return 1;//show upvote button
			}
		
	}
	
	function collegeStatus()
	{
		$sql = "SELECT * from issuebogusupvote where inst_id=$_";
		
	}
	
	function userStatus()
	{
		//isha
		$sql="select *from issue where issue_id =";
		if($result==TRUE)
		{
			return 0;//you hav alraedy voted 
		}
		else
		{
			return 1;//upvote button
		}
	
	}
	
?>