<?php

	include '../functions/dataBaseConn.php';

	session_start();
	$state = $_GET['state'];
	$district = $_GET['district'];
	$locality = $_GET['locality'];
	$pin = $_GET['pin'];
	$title = $_GET['issueTitle'];
	$title = strtolower($title);
	$description = $_GET['description'];
	$description = strtolower($description);

	#To get user_id from email
	$user_email = $_SESSION['$email'];
	//echo "".$user_email;
	$get_user_id_sql = "SELECT * FROM user WHERE user_email = '".$user_email."'";
	$get_user_id = $conn->query($get_user_id_sql);
	$get_user_id_res = $get_user_id->fetch_assoc();
	$user_id = $get_user_id_res['user_id'];

	/*$get_state_id = "SELECT * FROM state WHERE state_name = '".$state."'";	
	$state1 = $conn->query($get_state_id);
	$get_state = $state1->fetch_assoc();
	$state_id = $get_dist['state_id'];
	echo "".$state_id;*/

	$get_district_id = "SELECT district_id FROM district WHERE district_name = '".$district."'";	
	$dist = $conn->query($get_district_id);
	$get_dist = $dist->fetch_assoc();
	$district_id = $get_dist['district_id'];
	
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
	$issue_id = $j+1;

	//echo "district_id = ".$district_id."<br>";
	#get region_id also
	$get_region_id = "SELECT region_id FROM districtsinregion WHERE district_id = '".$district_id."'";
	$result = $conn->query($get_region_id);
	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			#iterate till the last issue to get its id
			$region_id = $row['region_id'];
		}
	}
	
	
	if($locality != "")
	{
		if($pin != "")
		{
			$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, locality, pin, title, description)VALUES('$issue_id','$user_id','$district_id', '$region_id', '$locality', '$pin', '$title','$description')";
		}
		else
		{
			$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, locality, title, description)VALUES('$issue_id','$user_id','$district_id', '$region_id', '$locality', '$title','$description')";
		}
	}
	else
	{
		$sql = "INSERT INTO issue(issue_id, user_id, district_id, region_id, title, description) VALUES
			('$issue_id','$user_id','$district_id', '$region_id', '$title','$description')";
	}

	if ($conn->query($sql) === TRUE)
	{
	    echo "New record created successfully";
	    $solutionLikeAfterAdd = "INSERT INTO issueupvote(user_id,issue_id) VALUES('$user_id','$issue_id')";
	    $result = $conn->query($solutionLikeAfterAdd);
	}
	else
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>