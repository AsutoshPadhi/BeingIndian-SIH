<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="functions/ajax.js"></script>

    <title>Better India!</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php
                    session_start();

                    if(isset($_SESSION['$email'])){
                        $login = true;
                        $email = $_SESSION['$email'];
                        $name = $_SESSION['$name'];
                        $fname = $_SESSION['$fname'];
                        $lname = $_SESSION['$lname'];
                        
                    }
                    else{
                        $login = false;
                    }

                    if($login){

                ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    }
                ?>
                <a class="navbar-brand" href="index.html"><font color=#E77607>Better</font><font color=#138808>India!</font></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-info fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a>
                                <div>
                                    <i class="fa fa-info-circle fa-fw"></i> User guide
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-institution fa-fw"></i> Institute guide
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <?php
                            
                            if($login){
                        ?>
                            <li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        <?php
                            }
                            else{
                        ?>
                        <li><a onClick="javascript:loadDoc('login.php')"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a href="#"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
                        <?php
                            }
                        ?>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php
                if($login){

            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>

                            <a onClick="javascript:loadDoc('search1.php')"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-plus fa-fw"></i> Add Issue</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> History<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Added by you</a>
                                </li>
                                <li>
                                    <a href="morris.html">Upvoted by you</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <?php
                }
            ?>
            <!-- /.navbar-static-side -->
        </nav>
        
        <!-- Page Content -->
			<script>
				if (window.XMLHttpRequest)
				{
					// code for modern browsers
					xhttp = new XMLHttpRequest();
				}
				else
				{
					// code for IE6, IE5
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xhttp.onreadystatechange = function()
				{
					if (this.readyState == 4 && this.status == 200)
					{
						document.getElementById("field").innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", 'search1.php', true);
				xhttp.send();
			</script>
            <div class="container-fluid" id="field">
                
            </div>
			<div>
			<?php
					$con= mysqli_connect("localhost","root","");
					$selected = mysqli_select_db($con,'problems') 
					or die("Could not select examples");
					$sql="Select * from issue where 1 ";
					$result=mysqli_query($con,$sql);
					$no_of_results=mysqli_num_rows($result);
					$results_per_page=5;
					while($row= mysqli_fetch_array($result))
					{
					$row=$row['issue_id'].''.$row['title'].''.'<br>';
					}

					//dtermine the number of pages in a page
					$no_of_pages= ceil($no_of_results/$results_per_page);

					//determine the number of results in one page

					if(!isset($_GET['page']))
					{
					$page=1;
					}
					else
					{
					$page=$_GET['page'];
					}

					$start_limit=($page-1)*$results_per_page;


					$last=$row/$results_per_page;
					if($last<1)
					{
					$last=1;
					}
					$sql="select * from issue LIMIT ".$start_limit.','.$results_per_page;

					$result=mysqli_query($con,$sql);?>
					<div class="container">
            <ul class="pagination">
              <li><a href="">&laquo;</a></li>

              <?php

                for($page=1;$page<=$no_of_pages;$page++)
                {
                  $pageurl = 'search'.$page.'.php';
              ?>
                <li><a onClick="javascript:loadDoc($pageurl)"><?php echo $page; ?><a><li>
              <?php
                }
              ?>
              <li><a href="">&raquo;</a></li>
            </ul>
          </div>					
			</div>
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->

        
    </div>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
