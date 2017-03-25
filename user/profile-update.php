<?php
	
	include '../functions/dataBaseConn.php';
	//session_start();
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$state = $_POST['state3'];
	$district = $_POST['district3'];
	echo $state;

	#query to get district_id
	$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
	$result = $conn->query($get_district_id);
	$row = $result->fetch_assoc();
	$district_id = $row['district_id'];

	#sql to insert the details into database
	$sql = "UPDATE user SET mobile_number = '".$mobile."' WHERE user_email = '".$email."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($result)
	{
		echo 'true';
	}
	else
	{
		echo 'error';
	}
?>