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

    function userStatus($userid,$issueid)
	{
		include '../functions/dataBaseConn.php';
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
			echo "<button style='margin-left: 15px' class='btn btn-primary' onclick='upvoteUser('$id')'> Upvote</button>";
		}
		
	}

?>