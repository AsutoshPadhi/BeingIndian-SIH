<div id=<?php echo $row['issue_id'] ?> >
	<?php
	if($login)
	{
		userStatus($email,$row['issue_id']);
	}
	else
	{
	?>
		<button style='margin-left: 15px' class='btn btn-default' data-toggle='modal' data-target='#confirmation'  >Upvote</button>
	<?php	
	}	
	?>
</div>
<?php
	if($row["solution_count"] >0)
	{
?>
		<div class='panel-body'>
			<!-- Button trigger modal -->
			<?php
				$sql1="select * from solution where issue_id=".$row['issue_id']."";
				$result1=mysqli_query($con,$sql1);
				while($row=mysqli_fetch_array($result1))
				{
			?>
					<a class='' id="video<?php echo $row['solution_id'];?>" data-toggle='modal' data-target='#solution<?php echo $row['solution_id'] ;?>'data-theVideo="<?php echo $row['solution_url'];?>">
						<?php echo $row['solution_url'];?>
					</a><br><hr>
					<!-- Modal -->
					<div class='modal fade' id='solution<?php echo $row['solution_id'];?>' tabindex='-1' role='dialog' aria-labelledby='videoModal' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'>Solutions </h4>
								</div>
								<div class='modal-body'>
								<iframe width="560" height="315" src="<?php echo $row['solution_url']?>" frameborder="0" allowfullscreen></iframe>				<br>
								<br>
								<?php
								if($login)
								{
									$userid=getUserId($email);
									$sql="select * from issueupvote where user_id=$userid and issue_id=".$row['issue_id']."";
									$result=mysqli_query($con,$sql);
									if($result==TRUE)
									{
									?>
								<div id="like">
									<a onclick='javascript:loadDoc("likecount.php?solutionid=<?php echo $row['solution_id'] ?>&useremail=<?php $email ?>","like")' class="btn btn-default btn-sm">
										<span class="glyphicon glyphicon-thumbs-up"></span> 
									</a>
								</div>
								<?php
									}
									else
									{
										echo "Not upvoted this problem";
									}
									
								}
								else
								{
								?>
									<a  class="btn btn-default btn-sm" data-toggle='modal' data-target='#confirmation' data-dismiss='modal' >
										<span class="glyphicon glyphicon-thumbs-up"></span> 
									</a></div>
								<?php	
								}
								?>
								<script>
									var youtubeFunc ='';
									var outerDiv = document.getElementById("solution<?php echo $row['solution_id'];?>");
									var youtubeIframe = outerDiv.getElementsByTagName("iframe")[0].contentWindow;
									$('#solution<?php echo $row['solution_id'];?>').on('hidden.bs.modal', function (e) {
									youtubeFunc = 'pauseVideo';
									youtubeIframe.postMessage('{"event":"command","func":"' + youtubeFunc + '","args":""}', '*');
									});

								</script>	
								</div>
							<!-- /.modal-content -->
							</div>
						<!-- /.modal-dialog -->
						</div>
					<!-- /.modal -->
					</div>
			<?php	
				}
			?>
		</div>
<?php
	}
?>

<div class="modal fade" id='myModal<?php echo $id; ?>' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">Issue<?php echo " #".$id; ?></h4>
			</div>
			<div class="modal-body">
				<?php 
				
					$sql3="Select * from issue where issue_id='$id'";
					$result3=mysqli_query($con,$sql3);
					$row= mysqli_fetch_array($result3);
					echo "Code: #".$id;
					echo "<br><br>Title: ".$row['title'];
					echo "<br><br>Description:";
					echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['description'];

				?>
			</div>
		</div>
	</div>
</div>