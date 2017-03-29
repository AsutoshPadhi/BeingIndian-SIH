<?php

	session_start();
	if(isset($_GET['toOpen']))
	{
		$toOpen = $_GET['toOpen'];
		if($toOpen == "search")
		{
			$_SESSION['toOpen'] = "search.php";
		}
		else
		{
			$_SESSION['toOpen'] = "add-issue.php";
		}
		header("Location: dashboard.php");
	}

?>