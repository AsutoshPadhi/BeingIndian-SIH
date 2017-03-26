<?php
//added by user
include("..functions/dataBaseConn.php");
echo "<b>The issues added by you are....</b>";
//	include('..function/issueFeatures.php');
	$sql="select issue.title ,issue.user_email from issue inner join user on issue.user_id=user.user_id where  user_email='$_SESSION['']'";
	//historyadd($sql);
	historyadd($sql);


?>
<?php
//upvoted by you
include("dataBaseConn.php");
include('..functions/issueFeatures.php');
echo "The issues upvoted by you are:";
$sql1="select issue.title ,issue.user_email from issue inner join user on issue.user_id=user.user_id where  user_email='$_SESSION['']'";
$result1 = $conn->query($sql1);
		//$row = $result->fetch_assoc();
		if($result1->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result1->fetch_assoc())
			{
				$id=$row['user_id'];
			}

$sql="SELECT user.fname,user.lname ,issue.title FROM user INNER JOIN issueupvote inner join issue on user.user_id=issueupvote.user_id and issue.issue_id=issueupvote.issue_id WHERE issueupvote.user_id='$id'";
historyUpvote($sql);

?>

