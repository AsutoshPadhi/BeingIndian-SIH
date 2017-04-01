<div id=upvote<?php echo $row['issue_id'] ?> >
	<?php
	$issueid=$row['issue_id'];
	require_once('functions/func_in.php');
	if($login)
	{
		if($row['user_id'] == getUserId($email)){
			echo "You've added this issue!";
		}
		else{
			if(!userStatus($email,$row['issue_id'])){
				echo "<button style='margin-left: 15px' class='btn btn-default' onclick=\"loadDoc('dip.php?issueid=".$row['issue_id']."&userid=".$row['user_id']."','upvote".$row['issue_id']."')\">Upvote</button><br><br>". NumberOfCounts($issueid);
			}
			else{
				echo "You've Already Upvoted this issue!";
			}
		}
	}
	else
	{
    
    
	?>
		<button style='margin-left: 15px' class='btn btn-default' data-toggle='modal' data-target='#userLogin'  >Upvote </button><i> &nbsp;(Requires login)</i>
		<br><br><?php NumberOfCounts($issueid)?>
	<?php	
	}	$issue=$row['issue_id'];
			$title=$row['title'];
				$url="issue-collapse.php?issueid=$issue&title=$title";
				?>
				<br>
				<br>
				<div id="url">
				<button style='margin-left: 15px' class='btn btn-primary' onclick="javascript:loadDoc('midshare.php?issueid=<?php echo $issue?>&titleid=<?php echo $title?>','url')">Share</button>
				</div>

</div>
<hr>

<?php

	require('soln-display.php');

?>
<?php
	require('issue-desc.php');
?>
<div class="modal fade" id='confirmation' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">PLEASE LOGIN</h4>
			</div>
			<div class="modal-body">
				<?php 
				echo "<a href='#userLogin'  class='btn btn-default' data-toggle='modal' data-dismiss='modal'  >Click here to login</a> ";
				?>
			</div>
		</div>
	</div>
</div>