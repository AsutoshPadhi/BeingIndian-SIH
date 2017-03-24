<?php

	include '../functions/dataBaseConn.php';
	//function showStatus()
	//{
		

		$state_id = 1006;
		$sql = "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo "test";
		echo "".$row['upvote_count'];
	//}

?>