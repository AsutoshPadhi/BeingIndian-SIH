<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="functions/ajax.js"></script>
		<script src="urlGenerator.js"></script>

        <title>Better India!</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Social Buttons CSS -->
        <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	

    <body>

		<div>
            <form>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="state1" onchange="getDistrict((document.getElementById('state1').value),'district1')">
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
                    <select class="form-control" id="district1" onfocus="getDistrict((document.getElementById('state1').value),'district1');return false;">             
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
                
			</form>
        </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</html>