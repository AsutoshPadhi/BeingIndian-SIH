<!-- Hello World-->
<head>
	<link rel="stylesheet" href="problemdescription.css">
</head>
<?php
	$callFunction = $_REQUEST['callFunction'];			//Receives 

    if($callFunction == "get_query")
       get_query();
	function get_query()
	{
		include '../functions/dataBaseConn.php';
		require_once 'CosineSimilarity.php';
		/*For notification and proceed to add button*/
		?>

		<br>
		<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Please check if the solution already exists or else Proceed.
        </div>

		<?php

		$str = $_GET['issue'];
		$state = $_GET['state'];
		$district = $_GET['district'];
		$locality = $_GET['locality'];
		$pin = $_GET['pin'];
		$type = $_GET['type'];

		$cs = new CosineSimilarity();

		$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		
		if($str == "")
		{
			$sql = "SELECT *FROM issue WHERE district_id = '".$row['district_id']."'";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				$i=0;
				while($i<$result->num_rows)
				{
					$row = $result->fetch_assoc();
					require 'issue-display2.php';
					$i++;
				}
			}
		}

		$query_word_count =  array_count_values(str_word_count($str, 1));

		$sql = "SELECT *FROM issue WHERE district_id = '".$row['district_id']."'";
		$result = $conn->query($sql);

		if($result->num_rows > 0)
		{
			$i=0;
			$flag = 0;

			while($i<$result->num_rows)
			{
				$row = $result->fetch_assoc();
				//echo "<a href='#'>".$row['description']."</a>";
				$issue_word_count =  array_count_values(str_word_count($row['title'], 1));
				//print_r( array_count_values(str_word_count($row['description'], 1)) );
				
				$percentage = $cs->similarity($query_word_count,$issue_word_count);
				//var_dump($percentage);
				
			
				if($percentage>0.3)
				{
					$flag=1;

					#displays the problem list
					require 'issue-display2.php';
				
				}
				
				$i++;
			}
			if($flag == 0)
			{
				?>
					<br><br><br>
					<div class="alert alert-danger alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <p>No results.</p>
		            </div>
				<?php
			}
		}
		else
		{
			echo "not working";
		}

		if($type == 'add')
		{
		?>		
		<br><br><hr>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="loadDoc('add-issue-description.php?state=<?php echo $state ?>&district=<?php echo $district ?>&issue=<?php echo $str ?>&locality=<?php echo $locality ?>&pin=<?php echo $pin ?>','field');return false;">Proceed to Add new Issue</button>		<!--Add the variable to be passed to the url-->

	<?php
		}
	}

?>