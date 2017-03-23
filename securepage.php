<?php
	session_start();
	//$use_name=$_POST['username'];
	if($_SESSION['login_user']!=null)
	{
		//echo "Welcome " . $_SESSION['login_user'] . "<br>";
		$a=$_SESSION['login_user'];
		
 $conn=mysqli_connect("localhost","root","","hackathon");
//$result=$conn->query($sql); //this query is stored in result variable 
$sql="select * from institute where inst_email='$a'";
$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))//fetch a complete record from a particular table
			{
				$flag=$row['flag'];
				if($flag==0)
				{
					$sql="Update institute set flag=1 where inst_email='$a'";
                    $result=mysqli_query($conn,$sql);
					header("location:loginpage2.php");
				
				}
				else
				{
					 include("insthomepage.php");
				
					header("location:insthomepage.php");
				}
			}
	}
	
	else
	{
		echo "<b>Something went wrong</b>!!!!";
		
	}
?>