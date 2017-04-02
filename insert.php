<?php 
if(isset($_POST['comment']))
{
	$text=$_POST['comment'];
	$sqlpre="SELECT * from comments ";
	$resultpre=$conn->query($sqlpre);
	$last_id = $conn->insert_id;
	$sql = "INSERT INTO comments(comment_id,comment_desc, inst_id) VALUES (id,comment,instid)";
}



?>