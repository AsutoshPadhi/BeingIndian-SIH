<!-- This gives the college list according to the district selected -->
<?php

	include '../functions/dataBaseConn.php';

	$district = $_GET['district'];
	//echo "<option>".$state."</option>";

	$getDistrictId = "SELECT district_id FROM district WHERE district_name = '".$district."'";
	$resultDistrictId = $conn->query($getDistrictId);
	$districtId = $sid->fetch_assoc();
	$getInstitutes = "SELECT inst_name FROM institute WHERE district_id = '".$districtId['district_id']."'";
	$resultInstitutes = $conn->query($sql);
	if($resultInstitutes->num_rows>0)
	{
		while($institutes = $resultInstitutes->fetch_assoc())
		{
			$inst = $institutes['inst_name'];
			echo "<option>".$inst."</option>";
		}
	}
	else
		echo "<option disabled>Change the district First</option>";

	$conn->close();
?>
