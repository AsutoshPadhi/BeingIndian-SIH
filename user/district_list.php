<!-- This gives the district list according to the state list -->
<?php

	include '../functions/dataBaseConn.php';

	$state = $_GET['state'];
	echo "<option>".$state."</option>";
	//echo "<option>".$state."</option>";
	if($state == 1){
		$getDistrict = "SELECT * FROM district WHERE 1";
		$resultDistrict = $conn->query($getDistricts);
		while($district = $resultDistricts->fetch_assoc()){
			echo "<option>".$district['district_name']."</option>";
		}
	}
	else{
	$sql1 = "SELECT state_id FROM state WHERE state_name = '".$state."'";
	$sid = $conn->query($sql1);
	$row1 = $sid->fetch_assoc();
	$sql = "SELECT district_name FROM district WHERE state_id = '".$row1['state_id']."'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		echo "<option value='1' selected>All Districts</option>";
		while($row = $result->fetch_assoc())
		{
			$district = $row['district_name'];
			echo "<option>".$district."</option>";
		}
	}
	else
		echo "<option disabled>Change the State First</option>";
	}

	$conn->close();
?>
