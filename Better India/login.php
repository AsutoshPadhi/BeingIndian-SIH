<?php

if(isset($_POST['submit']))
{
	echo "hello";
	if(empty('password')||empty('username'))
	{
		echo "Username or password is invalid";
	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$pass =md5($password);
		$con=mysqli_connect("localhost","root","");
		$select=mysqli_select_db($con,"hackathon");
		$sql="Select * from institute where inst_email=$username and inst_password=$pass";
		$result=mysqli_query($con,$sql);

		if($result->num_rows!=0)
		{
			session_start();
			$_SESSION['login_user']=$username;
			$user=$_SESSION['login-user'];
			include("inst_dispaly.php");
			header("location:inst_dispaly.php");
		}
		else
		{
			echo"Invalid";
			//header("location:inst_dispaly.php");
		}
		
	}
	
}
else
{
	echo "something went wrong ";
}
$con->close();
?>