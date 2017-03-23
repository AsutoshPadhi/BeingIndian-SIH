<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="..jquery-3.2.0.min.js"></script>
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
</head>
<body>
<?php
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


$last=$row/$results_per_page;
if($last<1)
{
	$last=1;
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
			
			<button type="button" class="btn btn-info problems btn btn-primary btn-lg btn-block " data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
			<?php  echo  $row["title"]. " " . "<br>";?>
			</button>
				<div id="demo<?php echo $i; ?>" class="collapse body">
					<?php
					echo "<b id='code'>CODE : </b> ".$row["issue_id"]; ?>
					<br><?php
						echo "<b id='code'>Description :</b> <br>".$row["description"];
						//echo $row[""]
						$i++;
					?>
				</div>
		<?php
			
		}
			//display links to the pages
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a href='search1new.php?page=".($page-1)."' class='button'>Previous</a></li>"; ?>

				<?php

					for($page=1;$page<=$no_of_pages;$page++)
					{
						$url = "search1new.php?page=".$page."";
				?>
						<script>
							var url<?php echo $page; ?> = '<?php echo $url; ?>';
						</script>
						<?php
								echo '<li><a onclick="javascript:loadSearch(url'.$page.')">'.$page.'</a></li>';

					}

			
				echo "<li><a href='search1new.php?page=".($page+1)."' class='button'>NEXT</a></li>";	?>
			</ul>
		</div>
	</div>
		
   


</body>
</html>
