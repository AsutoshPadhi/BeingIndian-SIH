<?php

	include '../functions/dataBaseConn.php';
	include('../functions/func_in.php');

	session_start();
	$inst_id = $_SESSION['$inst_id'];
	$cemail = $_SESSION['$cemail'];
	
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