<!-- Test for github -->

<?php
require '../globalVariables.php';
?>
<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
		<form action="#">

			<div class="form-group col-xs-6 col-md-2">
		        <select required class="form-control" id="state2" onchange="getDistrict((document.getElementById('state2').value),'district2')">
	            <?php
                    include '../functions/dataBaseConn.php';
                    session_start();
                    if(isset($_SESSION['district_id']))
                    {
                        $get_state = "SELECT * FROM state,district WHERE state.state_id = district.state_id AND district.district_id = ".$_SESSION['district_id']."";
                        $result = $conn->query($get_state);
                        $row = $result->fetch_assoc();
                        $state = $row['state_name'];
                        echo $state;
                ?>
                        <option selected><?php echo $state; ?></option>
                <?php
                    }

                    else
                    {

                ?>
                        <option disabled selected>State</option>
                <?php
                    }
                ?>
                    <?php include 'stateList.php'; ?>
                </select>
		    </div>

		    <div class="form-group col-xs-6 col-md-2">
		        <select required class="form-control" id="district2" onfocus="getDistrict((document.getElementById('state2').value),'district2');return false;">             
            		<?php
                        include '../functions/dataBaseConn.php';
                        session_start();
                        if(isset($_SESSION['district_id']))
                        {
                            $get_district = "SELECT * FROM district WHERE district_id = ".$_SESSION['district_id']."";
                            $result = $conn->query($get_state);
                            $row = $result->fetch_assoc();
                            $district = $row['district_name'];
                            echo $district;
                    ?>
                        <option selected><?php echo $district; ?></option>
                    <?php
                        }
                        else
                        {
                    ?>
                    	<option disabled selected>District</option>
                    <?php
                        }
                    ?>
                    <?php include 'district_list.php'; ?>
		        </select>
		    </div>

			<div class="col-xs-6 col-md-3">
				<input class="form-control" name="locality" id="locality2" type="text" placeholder="locality (optional)">
			</div>

			<div class="col-xs-6 col-md-3">
			    <input class="form-control" name="pin" id="pin2" type="text" placeholder="pincode (optional)">
			</div>

			<div style="position: relative;top: 50%;">
				<div class="form-group col-xs-6 col-md-9">
				<input class="form-control" name="issueTitle" id="issueTitle" placeholder="What Issue are you facing?" maxlength="<?php echo MAX_CHARACTER_TITLE ?>" required/>
				</div>
				<div class="form-group col-xs-6 col-md-3">
				<button type="button" class="btn btn-primary" onclick="generateUrl((document.getElementById('state2').value),(document.getElementById('district2').value),(document.getElementById('locality2').value),(document.getElementById('pin2').value),(document.getElementById('issueTitle').value),'field','add')">Next</button>
				</div>
			</div>

		</form>
	</body>
</html>