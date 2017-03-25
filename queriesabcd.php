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
jgghij
<button>Click me....</button>
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
	function historyUovote($sql)
	{
		
		
		
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
		$sql= "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['uovote_count']>=500)
		{
			
			if($row['approved_solution']>0)
			{
				echo "status approved";
			}
			else
				if($row['solution_count']>0)
				
				{
					echo " Following number of solutions are available";
				}
				else
					if($row['dupicate_count']>1)
					{
						echo "";
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
		//include '../functions/dataBaseConn.php';
		$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "hackathon";

	$conn = new mysqli($servername, $username, $password, $db);

	if($conn->connect_error)
	{
		die("Connection Failed".$conn->connect_error);
	}
		$sql="select * from  issue where 1";
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
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
	function reportedBogus($sql)
	{
		//include '../functions/dataBaseConn.php';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "hackathon";

	$conn = new mysqli($servername, $username, $password, $db);

	if($conn->connect_error)
	{
		die("Connection Failed".$conn->connect_error);
	}
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
	}
		
?>





<?php
//howStatus();
//historyadd("select * from issue inner join user on issue.user_id=user.user_id where  user_email='shreyajangale@gmail.com'");
//$result=f();
//addSolution("insert into solution(solution_id,issue_id,inst_id,solution_url,like_count,added_on) values($result+1,2003,6,'https://www.youtube.com/watch?v=G62HrubdD6o',,'2017-10-23')");
$result=f1();
echo $result;
reportedbogus("update issue set bogus_count=bogus_count+1 where issue_id='row['issue_id']'");
?>





</body>
</html>