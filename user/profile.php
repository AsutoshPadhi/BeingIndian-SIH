<?php
    //echo "This is profile";
	session_start();
	include '../functions/dataBaseConn.php';
	if(isset($_SESSION['$email']))
	{
		//echo "proceed<br>";
		$email = $_SESSION['$email'];
		$name = $_SESSION['$name'];
		//echo "email = ".$email."<br>";
		?>

			<div class="form-group input-group col-xs-6 col-md-4">
                <span class="input-group-addon"><i class="fa fa-laptop"></i>
                </span>
                <input type="text" class="form-control" value='<?php echo $email; ?>'">
            </div>

		<?php
		//echo "name = ".$name."<br>";

		$sql = "SELECT * FROM user where user_email = '".$email."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		if($row['mobile_number'] == "")
		{
			//echo "Enter phone number";
			?>

				<div class="form-group input-group col-xs-6 col-md-4">
	                <span class="input-group-addon"><i class="fa fa-mobile"></i>
	                </span>
	                <input type="text" class="form-control" placeholder="Enter your phone number">
	            </div>

			<?php
		}
		else
		{
			echo "mobile = ".$row['mobile_number'];
			?>
				<div class="form-group input-group col-xs-6 col-md-4">
	                <span class="input-group-addon"><i class="fa fa-mobile"></i>
	                </span>
	                <input type="text" class="form-control" value='<?php echo $row['mobile_number']; ?>'>
	            </div>

            <?php
		}
	}
	else
	{
		echo "error";
	}
?>