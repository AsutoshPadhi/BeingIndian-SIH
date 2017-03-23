<?php

	include 'C:\xampp\htdocs\Github\testProject\functions\dataBaseConn.php';

	$state = $_GET['state'];
	//echo "<option>".$state."</option>";

	$sql1 = "SELECT state_id FROM state WHERE state_name = '".$state."'";
	$sid = $conn->query($sql1);
	$sql = "SELECT district_name FROM district WHERE state_name = '".$sid."'";
	//$sql = "SELECT district_name FROM district INNER JOIN state ON state.state_name = '".$state"'";
	//$sql = "SELECT district_name FROM district WHERE state_id IN (SELECT state_id FROM state WHERE state_name = '".$state."'");
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
