<?php

	include 'C:\xampp\htdocs\Github\testProject\functions\dataBaseConn.php';

	session_start();
	$state = $_GET['state'];
	echo "state = ".$state;
	$district = $_GET['district'];
	$locality = $_GET['locality'];
	$pin = $_GET['pin'];
	$title = $_GET['issueTitle'];
	$description = $_GET['description'];

	$district_id = 2;
	$user_id = 2000;

	#$get_state_id = "SELECT state_id from state where state_name='.$state.'";
	$get_district_id = "SELECT district_id FROM district, state WHERE state.state_id = district.district_id";	
	#Use nested or join

	$get_last_issue_id = "SELECT issue_id FROM issue";

	#to get the last issue_id
	$result = $conn->query($get_last_issue_id);
	$j=0;
	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			$j++;
		}
	}
	$issue_id = 100000+$j;

	echo "issue_id".$issue_id;

	#get region_id also
	$get_region_id = "SELECT region_id FROM districtsinregion WHERE district_id = 2";	//Change this number
	$result = $conn->query($get_region_id);
	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			#iterate till the last issue to get its id
			$region_id = $row['region_id'];
		}
	}
	//echo "region_id".$region_id;

	$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, title, description) VALUES
			('$issue_id','$user_id','$district_id','$region_id','$title','$description')";
	$conn->query($sql);
	

	//$sql = "INSERT INTO issue(issue_id,)";
	if(isset($locality))
	{
		if(isset($pin))
		{
			$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, locality, pin, title, description)VALUES()";
		}
		else
		{
			$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, locality, title, description)VALUES()";
		}
	}
	else
	{
		$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, title, description)VALUES()";
	}

?>