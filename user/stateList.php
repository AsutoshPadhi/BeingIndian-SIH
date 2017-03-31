<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

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

	$sql = "SELECT state_name FROM states";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$state = $row['state_name'];
			echo "<option>".$state."</option>";
		}
	}



	$conn->close();
?>

</body>
</html>