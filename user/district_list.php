<?php

	include '../functions/dataBaseConn.php';

	$state = $_GET['state'];
	echo "stet = ".$state;
	//echo "<option>".$state."</option>";

	$sql1 = "SELECT state_id FROM state WHERE state_name = '".$state."'";
	$sid = $conn->query($sql1);
	$row1 = $sid->fetch_assoc();
	$sql = "SELECT district_name FROM district WHERE state_id = '".$row1['state_id']."'";
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
		echo "<option disabled>Change the State First</option>";


	$conn->close();
?>
