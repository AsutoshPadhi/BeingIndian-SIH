<?php

	include '../functions/dataBaseConn.php';
	include('../functions/func_in.php');

	session_start();
	if(isset($_SESSION['$email']))
	{
		$instlogin = false;
		$login=true;
		$email = $_SESSION['$email'];
		//echo $email;
	}
	else if(isset($_SESSION['$cemail'])){
		$cemail = $_SESSION['$cemail'];
		$inst_id = $_SESSION['$inst_id'];
		$instlogin = true;
		$login = false;
		echo "not logged in";
	}	
	else
	{
		$login=false;
		$instlogin = false;
	}

	// $get_district_id = "SELECT *FROM institute WHERE inst_email = '".$email."'";
	// $result = $conn->query($get_district_id);
	// $row = $result->fetch_assoc();
	// $district_id = $row['district_id'];

	$issue_id = $_GET['issueNumber'];
	$district = $_GET['district'];

	$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
	$result = $conn->query($get_district_id);
	$row = $result->fetch_assoc();
	$district_id = $row['district_id'];

	$issueNumberSearch = "SELECT * FROM issue WHERE issue_id LIKE $issue_id AND district_id = $district_id";
	$result = $conn->query($issueNumberSearch);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$i=0;
		while($i<$result->num_rows)
		{
			require 'issue-collapse.php';
			$i++;
		}
	}
	else
	{
		?><br><br><br><div class="alert alert-success">
	        No Results Found
	    </div><?php
	}
	

?>