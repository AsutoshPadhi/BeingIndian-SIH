<?php
	session_start();
	include '../functions/dataBaseConn.php';
	//session_start();
	$email = $_SESSION['$email'];
	$mobile = $_POST['mobile'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$state = $_POST['state3'];
	$district = $_POST['district3'];


	#query to get district_id
	$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
	$result = $conn->query($get_district_id);
	$row = $result->fetch_assoc();
	$district_id = $row['district_id'];

	#sql to insert the details into database
	$sql = "UPDATE user SET mobile_number='$mobile', fname='$fname', lname='$lname', district_id = $district_id WHERE user_email='$email'";
	$result = $conn->query($sql);
	if($result)
	{
		header('Location: dashboard.php');
	}
	else
	{
		header('Location: logout.php');
	}
?>