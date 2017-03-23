<?php

	include 'C:\xampp\htdocs\Github\testProject\functions\dataBaseConn.php';

	

	$sql = "SELECT district_name FROM district WHERE state_id = "."SELECT state_id FROM state WHERE state =";
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
