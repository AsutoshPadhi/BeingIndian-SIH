<?php

	include '../functions/dataBaseConn.php';
	include('../functions/func_in.php');

	session_start();
	if(isset($_SESSION['$email']))
	{
		$instlogin = false;
		$login=true;
		$email = $_SESSION['$email'];
	}
	else if(isset($_SESSION['$cemail'])){
		$cemail = $_SESSION['$cemail'];
		$inst_id = $_SESSION['$inst_id'];
		$instlogin = true;
		$login = false;
	}	
	else
	{
		$login=false;
		$instlogin = false;
	}
	
	$get_district_id = "SELECT *FROM institute WHERE inst_email = '".$cemail."'";
	$result = $conn->query($get_district_id);
	$row = $result->fetch_assoc();
	$district_id = $row['district_id'];
	$issueNumber = $_GET['issueNumber'];
	
	$issueNumberSearch = "SELECT * FROM issue WHERE issue_id LIKE $issueNumber AND district_id = $district_id AND upvote_count > ".UPVOTE_THRESHOLD;
	$result = $conn->query($issueNumberSearch);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$i=0;
		while($i<$result->num_rows)
		{
			require '../issue-collapse.php';
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