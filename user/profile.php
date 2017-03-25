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
			<div class="form-group input-group col-xs-6 col-md-4">
                <!--<span class="input-group-addon"><i class="fa fa-laptop"></i></span>-->
                <label>Email : </label><input type="text" name="email" class="form-control" value='<?php echo $email; ?>'">
            </div>
            <div class="form-group">
                <input class="form-control">
                <p class="help-block"><?php echo $email; ?></p>
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
			?>

				<div class="form-group input-group col-xs-6 col-md-4">
	                <!--<span class="input-group-addon"><i class="fa fa-mobile"></i></span>-->
	                <label>Phone : </label><input type="text" name="mobile" class="form-control" placeholder="Enter your phone number">
	            </div>
	            <div class="form-group">
                    <input class="form-control" placeholder="<?php echo $row['mobile_number']; ?>">
                </div>

			<?php
		}
		else
		{
			echo "mobile = ".$row['mobile_number'];
			?>
				<div class="form-group input-group col-xs-6 col-md-4">
	                <!--<span class="input-group-addon"><i class="fa fa-mobile"></i></span>-->
	                <label>Phone : </label><input type="text" name="mobile" class="form-control" value='<?php echo $row['mobile_number']; ?>'>
	            </div>
	            <div class="form-group">
                    <input class="form-control" placeholder="<?php echo $row['mobile_number']; ?>">
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
		?>
		<label>Location : </label><br>
		<div class="form-group col-xs-6 col-md-4">
            <select class="form-control" style='padding-left: -15px' name="state" id="state1" onchange="getDistrict((document.getElementById('state1').value),'district3');return false;">
                <option selected><?php echo $state; ?></option>
                <?php include 'stateList.php'; ?>
            </select>
        </div>
        <div class="form-group col-xs-6 col-md-2">
            <select class="form-control" name="district1" id="district3">             
                <option selected><?php echo $district; ?></option>
            </select>
        </div><br><br><br>
		<button type="submit" class="btn btn-primary">Save Changes</button>
		</form>
		<?php

	}
	else
	{
		echo "error";
	}
?>