<!--buttons for upvote and like-->
<div id="upvote<?php echo $row['issue_id'] ?>" >
	<?php
	$issueid=$row['issue_id'];
	require_once('functions/func_in.php');
	if($login)
	{
		if($row['user_id'] == getUserId($email))
		{
			echo "You've added this issue!";
		}
		else{
			if(status($issueid)==0&&status($issueid)!=1&&status($issueid)!=2&&status($issueid)!=3&&status($issueid)!=4)//check status 
			{
			
				if(userStatus($email,$row['issue_id'])){
					echo "<button style='margin-left: 15px' class='btn btn-default' onclick=\"javasccript:loadDoc('dip.php?issueid=".$row['issue_id']."&userid=".$row['user_id']."','upvote".$row['issue_id']."')\">Upvote</button><br><br>". NumberOfCounts($issueid);
				}
				else{
					echo "You've Already Upvoted this issue!";
				}
			}
		}
	}
	else
	{
		if(status($issueid)==0)//check status 
			{
    
		
				?>
					<button style='margin-left: 15px' class='btn btn-default' data-toggle='modal' data-target='#userLogin'  >Upvote </button><i> &nbsp;(Requires login)</i>
					<br><br><?php NumberOfCounts($issueid)?>
				<?php	
			}
	
	}
	$issue=$row['issue_id'];
	$title=$row['title'];
	$url="issue-collapse.php?issueid=$issue&title=$title";
	?>
	<br>
	<br>
	<div id="url">
	<button style='margin-left: 15px' class='btn btn-default' onclick="javascript:loadDoc('midshare.php?issueid=<?php echo $issue?>&titleid=<?php echo $title?>','url')">Share</button>
	</div>

</div>
<hr>

<?php

	require('soln-display.php');

?>
<?php
	require('issue-desc.php');
?>