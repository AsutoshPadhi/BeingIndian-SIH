<!-- Hello World-->
<?php
	
	$callFunction = $_REQUEST['callFunction'];			//Receives 

    if($callFunction == "get_query")
       get_query();
	function get_query()
	{
		include '../functions/dataBaseConn.php';
		require_once 'CosineSimilarity.php';
		
		$str = $_GET['issue'];
		$state = $_GET['state'];
		$district = $_GET['district'];

		$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		//echo "".$row['district_id'];

		//print_r( array_count_values(str_word_count($str, 1)) );
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

		/*For notification and proceed to add button*/
		?>

		
		<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Please check if the solution already exists or else Proceed.
        </div>

		<?php
		for($i=0;$i<$result->num_rows;$i++)
		{
			$percentage[$i] = $cs->similarity($query_word_count,$issue_word_count[$i]);
			//var_dump($percentage[$i]);
			
			if($percentage[$i]>0.3)
			{
				//echo "<a href='#'>".$row[$i]['title']."</a>";
				
			?>
				
				<button type='button' class='col-md-12 btn btn-info problems' data-toggle='collapse' data-target="#demo<?php echo $i ?>">
				<?php  echo  $row[$i]["title"]. " " . "<br>";?>
				</button>
				<div id="demo<?php echo $i; ?>" class="collapse">
				<?php
				echo "CODE:".$row[$i]["issue_id"]; ?>
				<br><?php
					echo $row[$i]["description"];
					//echo $row[""]
					//$i++;
					?>
			  	</div><hr><br>
	  		<?php
			}
		}
		?>
		<br><br><hr>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="alert('what');loadDoc('add-issue-description.php?state=<?php echo $state ?>&district=<?php echo $district ?>&issue=<?php echo $str ?>','field')">Proceed to Add new Issue</button>		<!--Add the variable to be passed to the url-->

	<?php
	}

?>