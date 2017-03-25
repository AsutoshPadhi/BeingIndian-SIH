<?php
    //echo "This is profile";
	session_start();
	include '../functions/dataBaseConn.php';
	if(isset($_SESSION['$email']))
	{
		//echo "proceed<br>";
		$email = $_SESSION['$email'];
		$name = $_SESSION['$name'];
		
		#For Email
		?>
		<form action="profile-update.php" method="post">
			<div class="form-group col-xs-6 col-md-4">
                <label>Email : </label><input type="text" name="email" class="form-control" value='<?php echo $email; ?>'">
            </div>

		<?php
		//echo "name = ".$name."<br>";

		$sql = "SELECT * FROM user where user_email = '".$email."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		#For Mobile Number 
		if($row['mobile_number'] == "")
		{
			//echo "Enter phone number";
			?><br><br><br><br>
				<div class="form-group col-xs-6 col-md-4">
                    <label>Phone : </label><input class="form-control" type="text" name="mobile" placeholder="Enter your Phone Number">
                </div>

			<?php
		}
		else
		{
			//echo "mobile = ".$row['mobile_number'];
			?><br><br><br><br>
				<div class="form-group col-xs-6 col-md-4">
                    <label>Phone : </label><input type="text" name="mobile" class="form-control" value='<?php echo $row['mobile_number']; ?>'>
                </div>

            <?php
		}

		#for district
		$district_id = $row['district_id'];
		$sql = "SELECT * FROM district where district_id = '".$district_id."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$district = $row['district_name'];
		$state_id = $row['state_id'];
		#for state
		$sql = "SELECT * FROM state where state_id = '".$state_id."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$state = $row['state_name'];
		?><br><br><br><br>
		<label style="padding-left: 15px;">Location : </label>
		<div>
			<div class="form-group col-xs-6 col-md-4">
	            <select class="form-control" style='padding-left: -15px' name="state3" id="state3" onchange="getDistrict((document.getElementById('state3').value),'district3');return false;">
	                <option selected><?php echo $state; ?></option>
	                <?php include 'stateList.php'; ?>
	            </select>
	        </div>
	        <div class="form-group col-xs-6 col-md-2">
	            <select class="form-control" name="district3" id="district3">             
	                <option selected><?php echo $district; ?></option>
	            </select>
	        </div><br><br><br>
		</div>
		<div style="padding-left: 15px;"><button type="submit" class="btn btn-primary">Save Changes</button></div>
		</form>
		<?php

	}
	else
	{
		echo "error";
	}
?>