<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="problemdescription.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../functions/ajax.js"></script>
	<script>
		$(document).ready(function() 
		{
			$('#myModal3').on('show.bs.modal', function (e) 
				{
				var rowid = $(e.relatedTarget).data('id');                                                                                                 
				$.ajax({
							type : 'POST',
							url : 'fetch.php', //Here you will fetch records 
							data :  'rowid='+ rowid + '', //Pass rowid
							success : function(data)
							{
								$('#data').html(data);//Show fetched data
							}
						});
				});
		});
	</script>
	<!--<script src="../dist/js/sb-admin-2.js"></script>-->
</head>
<body>
	<?php
		require('../functions/func_in.php');
		if(!isset($_GET['sql'])){
			$sql = "SELECT * FROM issue WHERE 1";
		}
		else{
			$sql = $_GET['sql'];
		}
		$con= mysqli_connect("localhost","root","");
		$selected = mysqli_select_db($con,'hackathon') 
		or die("Could not select examples");
		$result=mysqli_query($con,$sql);
		$no_of_results=mysqli_num_rows($result);
		if($no_of_results == 0)
		{
			?>
				<div class="alert alert-danger">
                    No Results Found.
                </div>
			<?php
		}
		$results_per_page=5;

		//dtermine the number of pages in a page
		$no_of_pages= ceil($no_of_results/$results_per_page);

		//determine the number of results in one page
		if(!isset($_GET['page']))
		{
			$page=1;
		}
		else
		{
			$page=$_GET['page'];
		}

		$start_limit=($page-1)*$results_per_page;

		if($page>1)
		{
			$pre=$page-1;
			//$next=$page+1;
		}
		else
		{
			$pre=1;

		}
		if($page<$no_of_pages)
		{
			$next=$page+1;
		//$next=$page+1;
		}
		else
		{
			$next=$no_of_pages;

		}


		$sql2= $sql." LIMIT ".$start_limit.','.$results_per_page;
		$result=mysqli_query($con,$sql2);
	?>
	<div id="problem">	
	
		<?php
		$i = 1;
		while($row=mysqli_fetch_array($result))
		{
		

		// output data of each row

		?>
		<br>

		<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
		<?php echo "<font style='font-size: 1em;'>#".$row["issue_id"]."</font>".$row["title"]; ?>
		</button>
		<br>
		<div id="demo<?php echo $i; ?>" class="collapse body">
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo $row["issue_id"]; ?>	
			<br><hr>
			<?php
				$id = $row['issue_id'];
				echo "<b id='code'>STATUS :</b>";
			?>
			<?php 
			    echo status($row['issue_id']);
			?>
			<hr>
			
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
									} 
								$sql1="select solution_url from solution where issue_id=".$row['issue_id']."";
								$result1=mysqli_query($con,$sql1);
								while($row=mysqli_fetch_array($result1))
								{
								echo "<a href=".$row["solution_url"].">".$row["solution_url"]."</a> </br>";
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
						<h4 class="modal-title" id="myModalLabel">Description</h4>
					</div>
					<div class="modal-body">
						<?php echo $id; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
			$i++;
		}
		//display links to the pages
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$pre."\",\"field\")' class='button'>PREVIOUS</a></li>"; ?>

				<?php
					for($page=1;$page<=$no_of_pages;$page++)
					{	
						$url = "issue-display.php?sql=".$sql."&page=".$page."";
						echo "<li><a onclick='javascript:loadDoc(\"".$url."\",\"field\")'>".$page."</a></li>";
					}
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$next."\",\"field\")' class='button'>NEXT</a></li>";
				?>
			</ul>
		</div>
	</div>
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
		<div class="modal-dialog modal-md " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×</button>
					<h4 class="modal-title" id="myModalLabel">Description</h4>
				</div>
				<div class="modal-body">
					<div class="fetched-data">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
