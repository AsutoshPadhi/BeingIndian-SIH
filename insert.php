<?php 

require "functions/dataBaseConn.php";
echo "hii";

	
	$text=$_GET['url'];
	$inst=$_GET['inst'];
	$issue=$_GET['issue'];
	$sqlpre="SELECT * from comments  ";
	$resultpre=$conn->query($sqlpre);
	$last_id = $conn->insert_id;
	
	$sql = "INSERT INTO comments(comment_id,comment_desc, inst_id,issue_id) VALUES ($last_id,$text,$instid,$issue)";
	$result1=$conn->query($sql);
	header("location:threadpanel.php");


?>