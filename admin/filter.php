<!DOCTYPE html>
<html>

    <body>

		<div>
            <form action="admin-dashboard.php" method="POST" >

                <div class="form-group col-xs-6 col-md-6">
                    <select class="form-control" id="state1" onchange="getDistrict((document.getElementById('state1').value),'district1')">
                            <option value="1"  selected>All States</option>
                        <?php include '../user/stateList.php'; ?>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-md-6">
                    <select class="form-control" id="district1" onchange="getColleges((document.getElementById('district1').value),'college1')">             
                        <option value="1" selected>District</option>
                        <?php include '../user/district_list.php'; ?>
                    </select>
                </div>                
                <input class="search btn btn-primary" type="submit" value="Download Report" >
            </form>
        </div>

    <?php
        if(isset($_GET['state'])){
            $state = $_GET['state']; 
        }
        if(isset($_GET['district'])){
            $district = $_GET['district'];
        }
        if(isset($_GET['college'])){
            $college = $_GET['college'];
        }
    ?>
</html>