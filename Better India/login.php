<?php

if(isset($_POST['submit']))
{
	if(empty('password')||empty('username'))
	{
		echo "Username or password is invalid";
	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$con=mysqli_connect("localhost","root","");
		$select=mysqli_select_db($con,"hackathon");
		$sql="Select * from institute where inst_email=$username and inst_password=$password";
		$result=mysqli_query($con,$sql);

		if($result==TRUE)
		{
			session_start();
			$_SESSION['login_user']=$username;
			header("location:inst_dispaly.php");
		}
		else
		{
			echo"Invalid";
			header("location:inst_dispaly.php");
		}
		
	}
	
}

?>