<!DOCTYPE html>
</html>
<head>
<title>MyVOtingPage</title>
<style>
.sec{
	border:2px solid black;
	width:50%;
	height:50%;
	text-align:center;
	margin-top:80px;
	margin-left:80px;
}
</style>
</head>
<body>
<div class="sec">
<h1><u>WELCOME TO <span style="color:red">MY VOTING PAGE</span></u></h1>
<?php
$hostname="localhost";
$u_name="root";
$pass_name="";
$dbname="pollvote";
$conn=new mysqli($hostname,$u_name,$pass_name,$dbname);
if($conn->connect_error)
{
	die ("Error occured" . $conn->connect_error);
}
$id=$_GET['id'];
//echo $_POST['pollbutton'];
$sql="select *from poll where id='$id'"; //query to be executed 
$result=$conn->query($sql); //this query is stored in result variable 

if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())//fetch a complete record from a particular table
			{
			$title=$row['title'];
			$email=$row['email'];
			echo "<h2>".$title."</h2>";
			}
}
?>
<form action="" method="POST">
Enter your username..<br>
<input type="text" name="$username">
<table>
<?php

$sql1="select *from problems where id='$id'"; //query to be executed 
$result1=mysqli_query($conn,$sql1); //this query is stored in result variable
$user=$_POST['$username'];
	while($row1=mysqli_fetch_array($result1))//fetch a complete record from a particular table
			{
				$pollid=$row1['pollid'];
				$vote=$row1['votes'];
				$newvotes=$vote+1;
				if(isset($_POST['vote']))
			{
				$pollbutton=$_POST['pollbutton'];
				if($pollbutton=="")
				{
					die("You didn't select any option..");
				}
				else
				{
					$user1=explode(",",$email);
					if(in_array($user,$user1))
					{
						die("YOU HAVE ALREADY VOTED");
					}
					else{
						
					mysqli_query($conn,"update problems set votes='$newvotes' where pollid='$pollbutton' and id='$id' ");
					mysqli_query($conn,"insert into poll(id,title,pollid,email) values('$id','$title','$pollid','$user')");
					//mysqli_query($conn,"insert into poll(id,title,pollid,email) values(1,'waterPollution',100,'anusha')");
					die("<p style='color:blue'>Voted successfully......Thankyou!!!!</p>");
					}
				}
			}
				$problem=$row1['problems'];
				echo "<tr><td><h4>".$problem.'</h4></td><td><input type="radio" name="pollbutton" value="'.$pollid.'"checked="checked"></td></tr>';
			}
			
			
?>
<tr><td><input type="submit" name="vote" value="vote"></td></tr>
</table>
</form>
</div>
</body>
</html>