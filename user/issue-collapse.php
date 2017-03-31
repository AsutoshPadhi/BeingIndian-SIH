	<?php
		$issueid=$row['issue_id'];
			?>
			<br>

			<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social "  data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
			<?php echo "<font style='font-size: 0.8em;'>#".$row["issue_id"]."</font><font style='font-size: 0.8em;'> ".$row["title"]."</font>"; ?>
			</button>
			<br>
			<div id="demo<?php echo $i; ?>" class="<?php if($result->num_rows > 1)echo "collapse body";else echo "panel-collapse collapse-in body"; ?>" >
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row["issue_id"]; ?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >(Click here to see the description)</a> 	
			<br><hr>
				<b>Location : </b>
			<?php

				$district_issue = $row['district_id'];
				$getdistname = "SELECT * FROM district WHERE district_id = $district_issue";
				$resultdistname = $conn->query($getdistname);
				$arr = $resultdistname->fetch_assoc();
				$distname_issue = $arr['district_name'];
				echo $distname_issue.", ";
				$state_issue = $arr['state_id'];
				$getstatename = "SELECT * FROM state WHERE state_id = $state_issue";
				$resultstatename = $conn->query($getstatename);
				$arr = $resultstatename->fetch_assoc();
				$statename_issue = $arr['state_name'];
				echo $statename_issue;

			?>
			<br><hr>
			<?php
				
				echo  postedBy($row['issue_id']);
			?>
			<br><hr>
				
			<?php
				$id = $row['issue_id'];
				echo "<b id='code'>Status : </b>";
			?>
			<?php 
			    $status =  status($row['issue_id']);
			    switch($status){
			    	case 0:
			    		echo "Voting is on";
			    		break;
		    		case 1:
			    		echo "Voting Closed & Solutions are awaited";
			    		break;
			    	case 2:
			    		echo "Solutions are available";
			    		break;
			    	case 3:
			    		echo "Solution approved";
			    		break;
			    	case 4:
			    		echo "Repoted Bogus";
			    		break;
			    	case 5:
			    		echo "Repoted Duplicate";
			    		break;
			    }

			?>
			<hr>
			<div id=<?php echo $row['issue_id'] ?> >
			<?php
			if(isset($_SESSION['$email']))
			{
				$login = true;
				$email = $_SESSION['$email'];
			}
			else
				$login = false;
			if($login)
			{
					if(!userStatus($email,$row['issue_id']))
					{
						if(status($row['issue_id']) == 0)
							echo "<button style='margin-left: 15px' class='btn btn-primary' onclick='javascript:loadDoc(\"dip.php?issueid=".$row['issue_id']."&userid=".getUserId($email)."\",$issueid)'>Upvote</button>";
						else
						{
							echo "Voting is closed!";
						}
					}
					else
					{
						echo "You've Successfully upvoted this issue";
					}
					
			}
			else
			{?>
			<?php 
				if(status($row['issue_id']) == 0)
				{
			?>
					<button style='margin-left: 15px' class='btn btn-primary' data-toggle='modal' data-target='#confirmation'  >Upvote</button>
			<?php
				}
			}
			
				?>
				</div>
				<?php
				if($row['solution_count'] >0)
				{ 
					

			?>
			<hr>
			
			<div class='panel-body'>

				<!-- Button trigger modal -->
				<?php
				echo"<b id='code'><u>Solutions</u> </b><br><hr>";
				
				$viewsoln="select * from solution where issue_id=".$row['issue_id']."";
								$resultsoln=mysqli_query($conn,$viewsoln);
								while($row=mysqli_fetch_array($resultsoln))
								{?>
								<a class='' id="video<?php echo $row['solution_id'];?>" data-toggle='modal' data-target='#solution<?php echo $row['solution_id'] ;?>'data-theVideo="<?php echo $row['solution_url'];?>">
									<?php echo $row['solution_url'];?>
								</a><br><hr>
								<?php
								?>
				
				<!-- Modal -->
				<div class='modal fade' id='solution<?php echo $row['solution_id'];?>' tabindex='-1' role='dialog' aria-labelledby='videoModal' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' id='close' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'>Solutions </h4>
							</div>
							<div class='modal-body'>
							<?php
								$solnurl = $row['solution_url'];
								$code = substr($solnurl, (strpos($solnurl, "=") + 1), (strlen($solnurl) - 1) );
							?>
							<iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $code; ?>" frameborder="0" allowfullscreen></iframe>
							<br>
							<br>
							<?php
							if($login)
							{
								$userid=getUserId($email);
								$issueupvote="select * from issueupvote where user_id=$userid and issue_id=$issueid ";
								
								$resultupvote=mysqli_query($conn,$issueupvote);
								$solnlikedetails = "SELECT * FROM solutionlikedetails WHERE user_id = $userid AND solution_id = ".$row['solution_id']."";
								$resultsolnlikedetails = $conn->query($solnlikedetails);
								if($resultupvote->num_rows!=0)
								{
									
									if($resultsolnlikedetails->num_rows != 1){
									
								?>
									<div id="like">
									<a onclick='javascript:loadDoc("likecount.php?solutionid=<?php echo $row['solution_id'] ?>&useremail=<?php echo $email; ?>","like")' class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-thumbs-up"></span> 
									</a></div>
								<?php
									}
									else{
										echo "You've already liked this solution!";
									}
								}
								else
								{
									echo "Not upvoted this problem";
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
							

							
								
							</div>
						<!-- /.modal-content -->
						</div>
					<!-- /.modal-dialog -->
					</div>
				<!-- /.modal -->
				</div>
			<?php	}
		}?>
	</div>
		
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
						
							$issue="Select * from issue where issue_id='$id'";
							$result3=mysqli_query($conn,$issue);
							$no_of_results=mysqli_num_rows($result3);
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
						echo "<a href='#userLogin'  class='btn btn-primary' data-toggle='modal' data-dismiss='modal'  >Click here to login</a> ";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
