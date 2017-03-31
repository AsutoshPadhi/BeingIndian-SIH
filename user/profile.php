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
			<div class="form-group col-xs-12 col-md-8">
					<label for="email">Email</label>
					<input class="form-control" id="email" name="email" type="email" value="<?php echo $email; ?>" disabled>
            

		<?php
		//echo "name = ".$name."<br>";

		$sql = "SELECT * FROM user where user_email = '".$email."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$fname = $row['fname'];
		$lname = $row['lname'];
		#For Mobile Number 
			//echo "mobile = ".$row['mobile_number'];
		?>
		<label for="fname">Name :</label>
		<div style='margin-left: -15px;'>
			<div class="col-md-6">
				<input class="form-control " id="fname" name="fname" type="text" value="<?php if($fname!= "")echo $fname ?>" placeholder="First name" >
			</div>
			<div class="col-md-6">
				<input class="form-control col-md-6" id="lname" name="lname" type="text" value="<?php if($lname!= "")echo $lname ?>" placeholder="Last name" >
			</div>
		</div>
		<label for="mobile">Phone : </label>
		<input type="text" name="mobile" id="mobile" class="form-control" value='<?php echo $row['mobile_number']; ?>' placeholder="Enter your Phone Number">

		<?php
		#for district
		$district_id = $row['district_id'];
		$sql = "SELECT * FROM districts where district_id = '".$district_id."'";
		$result = $conn->query($sql);
		$row2 = $result->fetch_assoc();
		$district = $row2['district_name'];
		$state_id = $row2['state_id'];
		#for state
		$sql = "SELECT * FROM states where state_id = '".$state_id."'";
		$result = $conn->query($sql);
		$row3 = $result->fetch_assoc();
		$state = $row3['state_name'];

		?>
		<label for="state3">Location : </label>
		<div style='margin-left: -15px;'>
			<div class="col-md-8">
				<select class="form-control col-md-4" name="state3" id="state3" onchange="getDistrict((document.getElementById('state3').value),'district3');return false;">
					<option selected><?php if($state != "") echo $state;else echo "State" ?></option>
					<?php include 'stateList.php'; ?>
				</select>
			</div>
			<div class="col-md-4">
				<select class="form-control" name="district3" id="district3">             
					<option selected><?php if($district != "") echo $district;else echo "District" ?></option>
				</select>
			</div>
		</div>
		<div class="col-md-6" style="margin-top: 15px;" >
			<button type="submit" class="btn btn-primary">Save Changes</button></div>
		</div>
		</form>
		<?php

	}
	else
	{
		echo "error";
	}
?>