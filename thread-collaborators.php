<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>               
			   <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th> Name</th>
                                            <th>Email_id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
										<?php
										require_once("functions/dataBaseConn.php");
										//include '../functions/dataBaseConn.php';
										
										if($conn->connect_error)
										{
											die("Connection Failed".$conn->connect_error);
										}
										 $issue_id=$_GET['issueid'];
										
	
										$sql="Select *from collaborators inner join institute on collaborators.inst_id=institute.inst_id where collaborators.issue_id=$issue_id";
										$result=$conn->query($sql);
										
										while($row=$result->fetch_assoc()){
										$email=$row['inst_email'];
										$name=$row['inst_name'];
                                           echo" <td>".$name."</td>
                                            <td>".$email."</td>";
										}
                                        ?>
										
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
</body>
</html>