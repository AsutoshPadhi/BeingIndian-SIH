<?php
	
	$callFunction = $_REQUEST['callFunction'];			//Receives 

    if($callFunction == "get_query")
       get_query();
	function get_query()
	{
		include 'functions/dataBaseConn.php';
		require_once 'CosineSimilarity.php';
		
		$str = $_GET['issue'];
		$state = $_GET['state'];
		$district = $_GET['district'];


		//print_r( array_count_values(str_word_count($str, 1)) );
		$query_word_count =  array_count_values(str_word_count($str, 1));

		$sql = "SELECT title FROM issue";
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
			echo "not working";
		}

		$cs = new CosineSimilarity();

		for($i=0;$i<$result->num_rows;$i++)
		{
			$percentage[$i] = $cs->similarity($query_word_count,$issue_word_count[$i]);
			//var_dump($percentage[$i]);
			
			if($percentage[$i]>0.3)
			{
				//echo "<a href='#'>".$row[$i]['title']."</a>";
			?>
					<button type='button' class='btn btn-info problems' data-toggle='collapse' data-target="#demo<?php echo $i; ?>">
					<?php  echo  $row["title"]. " " . "<br>";?>
					</button>
					<div id="demo<?php echo $i; ?>" class="collapse">
					<?php
					echo "CODE:".$row["issue_id"]; ?>
					<br><?php
						echo $row["Description"];
						//echo $row[""]
						$i++;
					?>
				  	</div>;
		  	<?php
			}
		}

	}

?>