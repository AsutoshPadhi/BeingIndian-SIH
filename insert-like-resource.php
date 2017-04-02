<?php
	include 'functions/dataBaseConn.php';
	$inst_id = $_GET['inst_id'];
	$resource_id = $_GET['resource_id'];
	$insert_resource_like_sql = "INSERT INTO resource_like VALUES('$resource_id','$inst_id')";
	$insert_resource_like_res = $conn->query($insert_resource_like_sql);
	if($insert_resource_like_res)
	{
		echo "You liked it";
	}
?>