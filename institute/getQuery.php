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

		$str = $_GET['issue'];
		session_start();
		$cemail = $_SESSION['$cemail'];
		
		$get_district_id = "SELECT *FROM institute WHERE inst_email = '".$cemail."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		$district_id = $row['district_id'];

		$query_word_count =  array_count_values(str_word_count($str, 1));

		$sql = "SELECT *FROM issue WHERE district_id = '".$district_id."'";
		$result = $conn->query($sql);

		$cs = new CosineSimilarity();
		
		include('../functions/func_in.php');
		if(($result->num_rows>0) && $str!="")
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
					require 'issue-list.php';
				
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
		else if($str=="")
		{
			$sql = "SELECT *FROM issue WHERE district_id = '".$district_id."'";
			$result = $conn->query($sql);
			$i=0;
			while($i<$result->num_rows)
			{
				$row = $result->fetch_assoc();
				require 'issue-list.php';
				$i++;
			}
		}

	}
?>