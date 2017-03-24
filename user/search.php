<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="problemdescription.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../functions/ajax.js"></script>
</head>
<body>
	<?php
		require('dashboard-searchBar.php');
		$con= mysqli_connect("localhost","root","");
		$selected = mysqli_select_db($con,'hackathon') 
		or die("Could not select examples");
		$sql="Select * from issue where 1 ";
		$result=mysqli_query($con,$sql);
		$no_of_results=mysqli_num_rows($result);
		$results_per_page=5;
		while($row= mysqli_fetch_array($result))
		{
			$row=$row['issue_id'].''.$row['title'].''.'<br>';
		}

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


		$sql="select * from issue LIMIT ".$start_limit.','.$results_per_page;

		$result=mysqli_query($con,$sql);
	?>

	<div id="problem">
		<?php
		$i = 1;
		while($row=mysqli_fetch_array($result))
		{

		// output data of each row

		?>
		<br>

		<button type="button" class="btn  problems btn btn-primary btn-lg btn-block " data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
		<?php  echo  $row["title"]. " " . "<br>";?>
		</button>
		<div id="demo<?php echo $i; ?>" class="collapse body">
			<?php
				echo "<b id='code'>CODE : </b> ".$row["issue_id"]; ?>
			<br>
			<?php
				echo "<b id='code'>Description :</b> <br>".$row["description"];
			?><br>
			<br>

			<?php
			//echo $row[""]
				if($row["upvote_count"]>=500)
				{
					echo "Voting closed";
				}
				else
				{
					echo "<button  class='btn-primary'> Upvote</button>";
				}


				if($row["solution_count"] >0)
				{

			?>
			<div class='panel-body'>
				<!-- Button trigger modal -->
				<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal'>
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
		<?php
				$i++;
			}
		//display links to the pages
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a onclick='javascript:loadDoc(\"search.php?page=".$pre."\",\"problem\")' class='button'>PREVIOUS</a></li>"; ?>

				<?php
					for($page=1;$page<=$no_of_pages;$page++)
					{
						$url = "search.php?page=".$page."";
				?>
				<!--<script>
					alert("apple");
					var url<?php //echo $page; ?> = '<?php //echo $url; ?>';
					field = "problem";
				</script>-->
				<?php
						echo "<li><a onclick='javascript:loadDoc(\"".$url."\",\"problem\")'>".$page."</a></li>";
					}
					echo "<li><a onclick='javascript:loadDoc(\"search.php?page=".$next."\",\"problem\")' class='button'>NEXT</a></li>";
				?>
			</ul>
		</div>
	</div>

</body>
</html>
