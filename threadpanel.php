

<?php

require('functions/dataBaseConn.php');

$text=$_GET['url'];
$inst=$_GET['inst'];
$issue=$_GET['issue'];
$sqlpre="SELECT * from comments  ";
$resultpre=$conn->query($sqlpre);
$lastid = $conn->insert_id;
$last_id=$lastid+1;
$sql = "INSERT INTO comments(comment_id,comment_desc, inst_id,issue_id) VALUES ($last_id,$text,$instid,$issue)";
$result1=$conn->query($sql);

$sqlcomment="SELECT * from institute where inst_id=$instid";
$resultcomment=$conn->query($sqlcomment);
$row=$resultcomment->fetch_assoc();
$sqlinst="SELECT * from comments where issue_id=$issueid";
$resultinst=$conn->query($sqlinst);

while($rowinst=$resultinst->fetch_assoc())
{
?>
<div id="commentSection">
<div style="margin:10px" class="row" >
	<div class="col-lg-14">
		<div class="panel panel-default" >
			<div class="panel-heading panel-title"  >
				<?php 
					echo $row['inst_name'];
				
				?>
			</div>
			<div class="panel-body">
				<p><?php echo $rowinst['comment_desc']; ?></p>
				<br>
				<?php
				$comment=$rowinst['comment_id'];
				$sql="select * from replytocomment where comment_id=$comment";
				$result1=$conn->query($sql);
				//$row1=$result1->fetch_assoc();
				
				if($result1->num_rows>0)
				{
					while($row=$result1->fetch_assoc())
					{?>
						<div style="margin:10px" class="row" >
						<div class="col-lg-14">
							<div class="panel panel-default" >
								<div class="panel-heading panel-title"  >
								<?php
								$id=$row['inst_id'];
								$sql1="SELECT * from institute where inst_id=$id";
								$result2=$conn->query($sql1);
								$arr=$result2->fetch_assoc();

								echo $arr['inst_name'];
								?>
								</div>
								<div class="panel-body">
								<?php
								echo $row['comment_desc'];
								?>
								</div> 
			
							</div>
						</div>
						</div>
							
	<?php
					}
				}
}
				?>
				
			</div>
			
		</div>
		</div>
	
	</div>
</div>