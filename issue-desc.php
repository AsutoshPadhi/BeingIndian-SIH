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
					$result3=$conn->query($sql3);
					$rowresult3= mysqli_fetch_array($result3);                    
					echo "<b>Code: </b>#".$id;
					echo "<br><br><b>Title: </b>".$rowresult3['title'];
                    echo "<br><br><b>Location : </b>";
                    $district_issue = $row['district_id'];
                    $getdistname = "SELECT * FROM district WHERE district_id = $district_issue";
                    $resultdistname = $conn->query($getdistname);
                    $arr = $resultdistname->fetch_assoc();
                    $distname_issue = $arr['district_name'];
                    $state_issue = $arr['state_id'];
                    $getstatename = "SELECT * FROM state WHERE state_id = $state_issue";
                    $resultstatename = $conn->query($getstatename);
                    $arr = $resultstatename->fetch_assoc();
                    $statename_issue = $arr['state_name'];
                    echo $statename_issue.", ".$distname_issue.", ".$row['locality'].", ".$row['pincode'];
					echo "<br><br><b>Description: </b>";
					echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['description'];

				?>
			</div>
		</div>
	</div>
</div>