<?php

	include 'functions/dataBaseConn.php';

	session_start();
	$state = $_GET['state'];
	$district = $_GET['district'];
	$locality = $_GET['locality'];
	$pin = $_GET['pin'];
	$title = $_GET['title'];
	$description = $_GET['description'];

	$get_state_id = "SELECT state_id from state where state_name='.$state.'";
	$get_district_id = "SELECT district_id FROM district, state WHERE state.state_id = district.district_id";	
	#Use nested or join

	$get_last_issue_id = "SELECT issue_id FROM issue";

	$result = conn->query($get_last_issue_id);
	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			#iterate till the last issue to get its id
			$last_issue_id = $row['issue_id'];
		}
	}

	$issue_id = $last_issue_id+1;		//issue_id for the new issue

	#get region_id also
	$get_region_id = "SELECT region_id FROM districtsinregion WHERE district_id = ".$district_id;
	$result = conn->query($get_region_id);
	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			#iterate till the last issue to get its id
			$region_id = $row['region_id'];
		}
	}

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