<?php
	if($row["solution_count"] >0)
	{
?>
		<div class='panel-body'>
			<!-- Button trigger modal -->
			<?php
				$sql1="select * from solution where issue_id=".$row['issue_id']."";
				$resultsolution=mysqli_query($conn,$sql1);
				while($rowsolution=mysqli_fetch_array($resultsolution))
				{
			?>		
					<div>
					<b id="code">Solutions:</b>
					<br>
					<br>
					<a class='' id="video<?php echo $rowsolution['solution_id'];?>" data-toggle='modal' data-target='#solution<?php echo $rowsolution['solution_id'] ;?>'data-theVideo="<?php echo $rowsolution['solution_url'];?>">
						<?php echo $rowsolution['solution_url'];?>
					</a>
					</div><br>
					<?php
					$instid=$rowsolution['inst_id'];				
					$sqlinstname="SELECT * from institute where inst_id=$instid";
					$result3=mysqli_query($conn,$sqlinstname);
					$rowinst=mysqli_fetch_array($result3);
					
					
					?>
					<!-- Modal -->
					<div class='modal fade' id='solution<?php echo $rowsolution['solution_id'];?>' tabindex='-1' role='dialog' aria-labelledby='videoModal' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'>Solution by <?php echo $rowinst['inst_name'] ;?></h4>
								</div>
								<div class='modal-body'>
								<?php
								$solnurl = $rowsolution['solution_url'];
								$code = substr($solnurl, (strpos($solnurl, "=") + 1), (strlen($solnurl) - 1) );
								?>
								<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $code?>" frameborder="0" allowfullscreen></iframe>				<br>
								<br>
								<?php
								if($login)
								{
									$userid=getUserId($email);
									$sql="select * from issueupvote where user_id=$userid and issue_id=".$rowsolution['issue_id']."";
									$result=mysqli_query($conn,$sql);
									if($result==TRUE)
									{
									?>
									<div id="like">
										<a onclick='javascript:loadDoc("likecount.php?solutionid=<?php echo $rowsolution['solution_id'] ?>&useremail=<?php $email ?>","like")' class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-thumbs-up"></span> 
										</a>
									</div>
								<?php
									}
									else
									{
										echo "You didn't promoted this issue .Only promoters can like the solution ";
									}
									
								}
								else
								{
								?>
									<a  class="btn btn-primary btn-sm" data-toggle='modal' data-target='#confirmation' data-dismiss='modal' >
										<span class="glyphicon glyphicon-thumbs-up"></span> 
									</a></div>
								<?php	
								}
								?>
								<script>
									var youtubeFunc ='';
									var outerDiv = document.getElementById("solution<?php echo $rowsolution['solution_id'];?>");
									var youtubeIframe = outerDiv.getElementsByTagName("iframe")[0].contentWindow;
									$('#solution<?php echo $rowsolution['solution_id'];?>').on('hidden.bs.modal', function (e) {
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
		
<?php
	}
?>