<?php

function getlocation($email)
{
	
	$con=mysqli_connect("localhost","root","");
	$sql="select district_id from institute where inst_email=$email";
	$result=mysqli_query($con,$sql);
	//$row=mysqli_fetch_assoc($result);
	//$row = $result->fetch_assoc();
//return $row['district_id'];
echo $result;
return $result;
}

?>
