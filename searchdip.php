<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap_collapse.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!--<script src="..jquery-3.2.0.min.js"></script>-->
	<script>
	
	function loadSearch(url){
		if (window.XMLHttpRequest)
		{
			// code for modern browsers
			xhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				document.getElementById("problem").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", url, true);
		xhttp.send();
	}
	</script>
	<style>
	.data
	{
		position:fixed;
	}
	</style>
</head>
<body>
	<?php
		$con= mysqli_connect("localhost","root","");
		$selected = mysqli_select_db($con,'problems') 
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
		 ~$no_of_pages= ceil($no_of_results/$results_per_page);

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


		$last=$row/$results_per_page;
		if($last<1)
		{
			$last=1;
		}
		$sql="select * from issue LIMIT ".$start_limit.','.$results_per_page;

		$result=mysqli_query($con,$sql);
	?>
	<div id="problem">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Collapsible Accordion Panel Group
				</div>
					<div class="panel-body">
						<div class="panel-group" id="accordion">
		<?php
			$i = 1;
			while($row=mysqli_fetch_array($result))
			{
				?>
				<!--<button type="button" class="btn btn-info problems" data-toggle="collapse" data-target="#demo<?php //echo $i; ?>">-->
				<div class="panel-body">
		
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>"><?php  echo  $row["title"]. " " . "<br>";?></a>
					</h4>
				</div>
				<div id="collapse<?php echo $i?>" class="panel-collapse collapse in">
					<div class="panel-body">
						<?php
						echo "CODE:".$row["issue_id"]; ?>
						<br><?php
							echo $row["description"];
							//echo $row[""]
							$i++;
						?>
					</div>
				</div>
			</div>
			<!--<div class="panel panel-default">
			
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Collapsible Group Item #2</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Collapsible Group Item #3</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>-->
		</div>
	</div>
	
				
</div>
				<?php
			}
		
			//display links to the pages
		?>
					</div>
				</div>
			</div>
		</div>
	</div>			
	<div class="container data" >
		<ul class="pagination">
			<li><a href="">&laquo;</a></li>
			<?php

				for($page=1;$page<=$no_of_pages;$page++)
				{
					$url = "search1.php?page=".$page."";
			?>
			<script>
				var url<?php echo $page; ?> = '<?php echo $url; ?>';
			</script>
			<?php
					echo '<li><a onclick="javascript:loadSearch(url'.$page.')">'.$page.'</a></li>';

				}

			?>
			<li><a href="">&raquo;</a></li>
		</ul>
	<!--</div>
	</div>
	<div class="panel-body">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Collapsible Group Item #1</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
			<!--<div class="panel panel-default">
			
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Collapsible Group Item #2</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Collapsible Group Item #3</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
		</div>
	</div>-->
	
	   


</body>
</html>
