<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
		<?php echo "<font style='font-size: 1em;'>#".$row["issue_id"]."</font>".$row["title"]; ?>
		</button>
		<br>
		<div id="demo<?php echo $i; ?>" class="collapse body">
			<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row["issue_id"]; ?>	
		<br><hr>
		
		<?php
			
			echo  postedBy($row['issue_id']);
		?>
		<br><hr>
			
		<?php
			$id = $row['issue_id'];
			echo "<b id='code'>STATUS :</b>";
		?>
		<?php 
		    echo status($row['issue_id']);
		?>
		<hr>
		<div id=<?php echo $row['issue_id'] ?> >
		<?php
			session_start();
			$email = $_SESSION['$email'];
			userStatus($email,$row['issue_id']);
			
			
			?>
			</div>
			<?php
			if($row["solution_count"] >0)
			{

		?><hr>
		
		<div class='panel-body'>
			<!-- Button trigger modal -->
			<button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
			See the solution
			</button>
			<!-- Modal -->
			<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title' id='myModalLabel'> <? echo $row["solution_count"]; ?>Solutions are available</h4>
						</div>
						<div class='modal-body'>
							<?php
								//} 
							$sql1="select solution_url from solution where issue_id=".$row['issue_id']."";
							$result1=mysqli_query($conn,$sql1);
							while($row=mysqli_fetch_array($result1))
							{
							echo "<a href='".$row['solution_url']."'>".$row['solution_url']."</a> </br>";
							}
			}
							?>
						</div>
					<!-- /.modal-content -->
					</div>
				<!-- /.modal-dialog -->
				</div>
			<!-- /.modal -->
			</div>
		</div>
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
					
						$sql3="Select * from issue where issue_id='$id'";
						$result3=mysqli_query($conn,$sql3);
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

</body>
</html>