<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "hackathon";

	$conn = new mysqli($servername, $username, $password, $db);

	if($conn->connect_error)
	{
		die("Connection Failed".$conn->connect_error);
	}

	$sql = "SELECT district_name FROM district WHERE state_id = 1";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$district = $row['district_name'];
			echo "<option>".$district."</option>";
		}
	}
	else
		echo "<option>Not Working</option>";


	$conn->close();
?>
