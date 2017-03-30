<!doctype html>
<html>
<head>
<link rel="stylesheet" href="problemdescription.css">
</head>
<body>
<?php

$con=mysqli_connect("localhost","root","");
$selected=mysqli_select_db($con,'hackathon') or  die("could not select examples");

$sql="select *from issue where issue_id=100000";
$result=mysqli_query($con,$sql);
while($row= mysqli_fetch_array($result))
{
	
	 echo "<b id='code'>Code : </b>".$row['issue_id'].'<br><br><b id="code">Title : </b>'.$row['title'].''.'<br><br>';
	 echo "<b id='code'>Description :</b>".$row['description'];
}
//echo $row['title'];


?>
</body>
</html>