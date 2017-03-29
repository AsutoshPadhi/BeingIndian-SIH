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

		$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		
		if($str == "")
		{
			echo "empty";
			$sql = "SELECT *FROM issue WHERE district_id = '".$row['district_id']."'";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				for($i=0;$i<$result->num_rows;$i++)
				{
					require 'issue-display2.php';
				}
			}
		}

		$query_word_count =  array_count_values(str_word_count($str, 1));

		$sql = "SELECT *FROM issue WHERE district_id = '".$row['district_id']."'";
		$result = $conn->query($sql);

		if($result->num_rows > 0)
		{
			for($i=0;$i<$result->num_rows;$i++)
			{
				$row[$i] = $result->fetch_assoc();
				//echo "<a href='#'>".$row[$i]['description']."</a>";
				$issue_word_count[$i] =  array_count_values(str_word_count($row[$i]['title'], 1));
				//print_r( array_count_values(str_word_count($row[$i]['description'], 1)) );
			}
		}
		else
		{
			//echo "not working";
		}

		$cs = new CosineSimilarity();

		
		include('../functions/func_in.php');
		for($i=0;$i<$result->num_rows;$i++)
		{
			$percentage[$i] = $cs->similarity($query_word_count,$issue_word_count[$i]);
			//var_dump($percentage[$i]);
			
			if($percentage[$i]>0.3)
			{
				require 'issue-display2.php';
			}
		}

		if($type == 'add')
		{
		?>		
		<br><br><hr>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="loadDoc('add-issue-description.php?state=<?php echo $state ?>&district=<?php echo $district ?>&issue=<?php echo $str ?>&locality=<?php echo $locality ?>&pin=<?php echo $pin ?>','field')">Proceed to Add new Issue</button>		<!--Add the variable to be passed to the url-->

	<?php
		}
	}

?>