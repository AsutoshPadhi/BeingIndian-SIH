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
		session_start();
		if(isset($_SESSION['$email']))
		{
			$login=true;
			$email = $_SESSION['$email'];
		}	
		else
		{
			$login=False;
		}
		
		require('../functions/func_in.php');
		if(!isset($_GET['sql'])){
			$sql = "SELECT * FROM issue WHERE 1";
		}
		else{
			$sql = $_GET['sql'];
		}
		$conn= mysqli_connect("localhost","root","");
		$selected = mysqli_select_db($conn,'hackathon') 
		or die("Could not select examples");
		/*$state = $_GET['state'];
		echo $state;
		require 'getQuery.php';*/
		$result=mysqli_query($conn,$sql);
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


		$sql2= $sql." LIMIT ".$start_limit.','.$results_per_page;
		$result=mysqli_query($conn,$sql2);
	?>
	<?php
		if(!isset($_SESSION['district_id'])){
	?>
			<br>
			<div class="alert alert-danger text-center">
				Add state, district and other details to get relevent results!
			</div>
			<div class="alert alert-info text-center">
				Following are the recently added issue from all over India.
			</div>
	<?php
		}
	?>
	

	<div id="problem">
		<?php
		$i = 1;
		
		while($row=mysqli_fetch_array($result))
		{
			require("issue-collapse.php");
				$i++;
		}
		
		//display links to the pages
		if($no_of_pages > 1 ){
			
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=1\",\"field\")' class='button'>FIRST</a></li>"; ?>
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$pre."\",\"field\")' class='button'><<</a></li>"; ?>

				<?php
					for($page=1;$page<=$no_of_pages;$page++)
					{	
						$url = "issue-display.php?sql=".$sql."&page=".$page."";
						echo "<li><a onclick='javascript:loadDoc(\"".$url."\",\"field\")'>".$page."</a></li>";
					}
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$next."\",\"field\")' class='button'>>></a></li>";
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$no_of_pages."\",\"field\")' class='button'>LAST</a></li>";
				?>
			</ul>
		</div>
		<?php } ?>
	</div>
<?php
//require "modal.php";

?>
	
</body>
</html>
