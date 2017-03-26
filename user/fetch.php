 <?php
	 
		$id=$_POST['rowid'];
	if(isset($_POST['rowid']))
		{
			$con= mysqli_connect("localhost","root","");
			$selected = mysqli_select_db($con,'hackathon') ;	
			$id = $_POST['rowid']; //escape string
			// Run the Query
			// Fetch Records
			// Echo the data you want to show in modal
			$sql="Select * from issue where issue_id='".$_POST['rowid']."'";
			$result=mysqli_query($con,$sql);
			$no_of_results=mysqli_num_rows($result);
			
			$row= mysqli_fetch_array($result);
			echo "hello";
			echo $row['description'];
			
			
		}		

?>