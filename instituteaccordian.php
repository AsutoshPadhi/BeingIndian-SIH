<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	body{
		font-family: helvetica;
	}
	button
	{ 
		width:100%;
		background-color:;
	}
	.problems
	{
		background-color:#FA9836;
		border-color: #E77607;
	}
	.problems:hover
	{
		background-color: #FFB061;
	}
  </style>
</head>
<body>

<div class="container">
  
 <?php
//include ("a.php");
//$conn=new mysqli("localhost","root","","user");
$con=new mysqli("localhost","root","","hackathon");
$a=$_SESSION['login_user'];
echo "<h3>Welcome</h3>".$a;
$sql="SELECT * FROM issue INNER JOIN district INNER JOIN institute ON  district.district_id=issue.district_id and district.district_id=institute.district_id where institute.district_id=district.district_id and institute.inst_email='$a'";
$result=$con->query($sql);

if($result->num_rows!=0) {
    // output data of each row
	$i = 1;
    while($row = $result->fetch_assoc()) {?>
	<br>
	<br>
	<?php
	$upvote=$row['upvote_count'];
	if($upvote>=500)
	{?>
		 <button type="button" class="btn btn-info problems" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
      <?php  echo  $row["title"]. " " . "<br>";?>
	  </button>
	  <div id="demo<?php echo $i; ?>" class="collapse">
		<?php
		$var=$row["issue_id"];
		$var1=$row["inst_id"];
		echo "CODE:".$row["issue_id"]; ?>
		<br><?php
		
			echo $row["description"];
			echo "<button onclick='f()' id='". $i."'>Bogus</button>";
			
			$i++;
			
			$bogus=$row['bogus_count'];
			$duplicate=$row['duplicate_count'];
			$description=$row['description'];
			
			
			if(($upvote>=500)&&($bogus>=5))
			{
				echo "<h3>Status:Problem is approved and problem reported as bogus</h3>";
			}
			else if(($upvote>=500)&&($bogus<=5))
			{
				echo "<h3>Status:Problem is approved  and waiting for solution</h3>";
			}
			?>
	
			<script>
function f()
{
	document.getElementById('<?php echo $i;?>').innerHTML;
	
	//$con=new mysqli('localhost','root','','hackathon');
<?php	$sql1="update issue set bogus_count=bogus_count+1 where issue_id='$var'";
	$result1=$con->query($sql1);
	$sql2="insert into issuebogusupvote(inst_id,issue_id) values ('$var1','$var')";
	$result2=$con->query($sql2);		
	
	?>
}
</script>
	<?php
	}
	else
	{
		echo "<h1>No issues till now...</h1>";
	}
		$des=explode(",",$inst_id);

					if(in_array($var1,$des))
					{
						die("YOU HAVE ALREADY VOTED");
					}
		

	?>
	
  </div>
	  
		
   <?php }
	}
	 
else {
    echo "0 results";
}
$con->close();
?>
  
  
  <!--<div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>-->
</div>

</body>
</html>