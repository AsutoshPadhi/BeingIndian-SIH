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
		$state = $_GET['state'];
		$district = $_GET['district'];
		$locality = $_GET['locality'];
		$pin = $_GET['pin'];

		$get_district_id = "SELECT *FROM district WHERE district_name = '".$district."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		//echo "".$row['district_ido
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

		<br>
		<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Please check if the solution already exists or else Proceed.
        </div>

		<?php
		include('../functions/func_in.php');
		for($i=0;$i<$result->num_rows;$i++)
		{
			$percentage[$i] = $cs->similarity($query_word_count,$issue_word_count[$i]);
			//var_dump($percentage[$i]);
			
			if($percentage[$i]>0.3)
			{
				//echo "<a href='#'>".$row[$i]['title']."</a>";
				
			?>
				
				<!-- <button type='button' class='col-md-12 btn btn-primary problems' data-toggle='collapse' data-target="#demo<?php echo $i ?>">
				<?php  echo  $row[$i]["title"]. " " . "<br>";?>
				</button>
				<div id="demo<?php echo $i; ?>" class="collapse">
				<?php
				//echo "CODE:".$row[$i]["issue_id"]; ?>
				<br><?php
					//echo $row[$i]["description"];
					//echo $row[""]
					//$i++;
					?>
			  	</div><hr><br> -->


			  	<!-- Issue display -->

			  		<br>

			<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
			<?php echo "<font style='font-size: 1em;'>#".$row[$i]["issue_id"]."</font>".$row[$i]["title"]; ?>
			</button>
			<br>
			<div id="demo<?php echo $i; ?>" class="collapse body">
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row[$i]["issue_id"]; ?>	
			<br><hr>
			
			<?php
				
				echo  postedBy($row[$i]['issue_id']);
			?>
			<br><hr>
				
			<?php
				$id = $row[$i]['issue_id'];
				echo "<b id='code'>STATUS :</b>";
			?>
			<?php 
			    echo status($row[$i]['issue_id']);
			?>
			<hr>
			<div id=<?php echo $row[$i]['issue_id'] ?> >
			<?php
				session_start();
				$email = $_SESSION['$email'];
				userStatus($email,$row[$i]['issue_id']);
				
				
				?>
				</div>
				<?php
				if($row[$i]["solution_count"] >0)
				{

			?><hr>
			
			<div class='panel-body'>
				<!-- Button trigger modal -->
				<button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
				See the solution
				</button>
				<!-- Modal -->
				<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'> <? echo $row[$i]["solution_count"]; ?>Solutions are available</h4>
							</div>
							<div class='modal-body'>
								<?php
									//} 
								$sql1="select solution_url from solution where issue_id=".$row[$i]['issue_id']."";
								$result1=mysqli_query($conn,$sql1);
								while($row=mysqli_fetch_array($result1))
								{
								echo "<a href='".$row['solution_url']."'>".$row['solution_url']."</a> </br>";
								}
				}
								?>
							</div>
						<!-- /.modal-content -->
						</div>
					<!-- /.modal-dialog -->
					</div>
				<!-- /.modal -->
				</div>
			</div>
		</div>
		<div class="modal fade" id='myModal<?php echo $id; ?>' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-md " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×</button>
						<h4 class="modal-title" id="myModalLabel">Issue<?php echo " #".$id; ?></h4>
					</div>
					<div class="modal-body">
						<?php 
						
							$sql3="Select * from issue where issue_id='$id'";
							$result3=mysqli_query($conn,$sql3);
							$no_of_results=mysqli_num_rows($result3);
							$row= mysqli_fetch_array($result3);
							echo "Code: #".$id;
							echo "<br><br>Title: ".$row[$i]['title'];
							echo "<br><br>Description:";
							echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row[$i]['description'];

						?>
					</div>
				</div>
			</div>
		</div>

			  	<!-- Issue Display End -->

	  		<?php
			}
		}
		?>
		<br><br><hr>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="alert('<?php echo $locality ?>');loadDoc('add-issue-description.php?state=<?php echo $state ?>&district=<?php echo $district ?>&issue=<?php echo $str ?>&locality=<?php echo $locality ?>&pin=<?php echo $pin ?>','field')">Proceed to Add new Issue</button>		<!--Add the variable to be passed to the url-->

	<?php
	}

?>