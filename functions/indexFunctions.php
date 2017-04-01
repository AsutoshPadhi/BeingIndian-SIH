<?php

	function no_of_users($table)
	{
		include 'dataBaseConn.php';
		$no_of_users = "SELECT * FROM $table";
		$res_no_of_users = $conn->query($no_of_users);
		$i=0;
		if($res_no_of_users->num_rows>0)
		{
			while($row = $res_no_of_users->fetch_assoc())
			{
				$i++;
			}
		}
		return $i;
	}

?>