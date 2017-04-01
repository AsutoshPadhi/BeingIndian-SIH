<?php
	if($row["solution_count"] >0)
	{
?>
		<div class='panel-body'>
			<!-- Button trigger modal -->
			<?php
			//sql to display solution 
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
					</a>&nbsp;&nbsp;&nbsp;
					<?php
					$likes =NumberOfLikes($rowsolution['solution_id']);
					//condition to display whether the solution is aproved or not
					if($likes>=LIKE_THRESHOLD)
					{
						?>
						<i class="text-success"style="color:green">(approved solution)</i>
						<?php
						
					}
					?>
					</div><br>
					<?php
					//code to display solution by which college 
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
									$sqlsoln="select * from issueupvote where user_id=$userid and issue_id=".$rowsolution['issue_id']."";
									$resultsoln=mysqli_query($conn,$sqlsoln);
									$solution=$rowsolution['solution_id'];
									$sqlbutton="select * from solutionlikedetails where user_id=$userid and solution_id=$solution";
									$resultbutton=mysqli_query($conn,$sqlbutton); 
									if($resultsoln==TRUE)//condition to check whether the user has upvoted the issue or not 
									{
											if($resultbutton->num_rows==0)//condition to check whether user has already liked this solution
											{
											
												?>
												<div id="like">
													<a onclick='javascript:loadDoc("likecount.php?solutionid=<?php echo $rowsolution['solution_id'] ?>&useremail= <?php echo $email; ?>","like")' class="btn btn-primary btn-sm">
														<span class="glyphicon glyphicon-thumbs-up"></span> 
													</a>
													<!--display like count -->
													<i><?php echo $likes; ?>&nbsp;&nbsp;people have liked this </i>
												</div>
									<?php
											}
											else
											{
												echo "You have already liked this solution ";
											}
										
									
									}
									else
										{
											echo "Only the users who upvoted this issue may like the Solution. ";
										}
								}
									else
									{
										
									?>
									
										<a  class="btn btn-primary btn-sm" data-toggle='modal' data-target='#userLogin' data-dismiss='modal' >
											<span class="glyphicon glyphicon-thumbs-up"></span> 
										</a>
										<i><?php echo $likes; ?>&nbsp;&nbsp;people have liked this </i><br><!--like button without login-->
										</div>
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
		</div>
<?php
	}
?>