<?php
$con= mysqli_connect("localhost","root","");
$selected = mysqli_select_db($con,'problems') 
  or die("Could not select examples");
$sql="Select * from issue where 1 ";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
	
	 // output data of each row
	$i = 1;
    while($row = $result->fetch_assoc()) {?>
	<br>
	<br>
	  <button type="button" class="btn btn-info problems" data-toggle="collapse" data-target='#demo<?php echo $i; ?>'>
      <?php  echo  $row['title']. ' ' . '<br>';?>
	  </button>
	  <div id="demo<?php echo $i; ?>" class="collapse">
		<?php
		echo "CODE:".$row["issue_id"]; ?>
		<br><?php
			echo $row["Description"];
			//echo $row[""]
			$i++;
		?>
	  </div>
	  
		
   <?php }
}
//display links to the pages
?>