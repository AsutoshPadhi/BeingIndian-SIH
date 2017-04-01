<?php

	// RETURN NUMBER OF ROWS IN A QUERY 
	function no_of_users($table)
	{
		include 'dataBaseConn.php';
		$no_of_users = "SELECT * FROM $table";
		$res_no_of_users = $conn->query($no_of_users);
		return $res_no_of_users->num_rows;
	}

?>