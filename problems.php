<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap_collapse.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="..jquery-3.2.0.min.js"></script>
	</head>

	<body>


<?php
$con= mysqli_connect("localhost","root","");
$selected = mysqli_select_db($con,'hackathon') 
  or die("Could not select examples");
  
  
$sql="Select * from issue where 1 ";

$result=mysqli_query($con,$sql);
 

while($row= mysqli_fetch_array($result))
{
	$row=$row['issue_id'].''.$row['title'].''.'<br>';
}
 $no_of_results = mysqli_num_rows($result);
 
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


/*$last=$row/$results_per_page;
if($last<1)
{
	$last=1;
}*/
$sql="select * from issue LIMIT ".$start_limit.','.$results_per_page;

 $result=mysqli_query($con,$sql);

$i = 1;
while($row = mysqli_fetch_array($result))
{
   
	 // output data of each row
	
   
		?>
	<br>
	<br>
	  <button type="button" class="btn btn-info problems" data-toggle="collapse" data-target='#demo<?php echo $i; ?>'>
      <?php  echo  $row['title']. ' ' . '<br>';?>
	  </button>
	  <div id="demo<?php echo $i; ?>" class="collapse">
		<?php
			echo "CODE:".$row["issue_id"]; 
		?>
		<br>
		<?php
			echo $row["description"];
			$i++;
		?>
	  </div>
	  
		
   <?php 
}
//display links to the pages
?>

</body>
</html>