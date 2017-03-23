
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	session_start();
		//$use_name=$_POST['username'];
	if($_SESSION['login_user']!=null)
	{
		//echo "Welcome " . $_SESSION['login_user'] . "<br>";
		$a=$_SESSION['login_user'];
		 $conn=mysqli_connect("localhost","root","","hackathon");
		//$result=$conn->query($sql); //this query is stored in result variable 
		$sql="select * from institute where inst_email='$a'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))//fetch a complete record from a particular table
			{
				$flag=$row['flag'];
				if($flag==0)
				{
					$sql="Update institute set flag=1 where inst_email='$a'";
                    $result=mysqli_query($conn,$sql);
					header("location:loginpage2.php");
				
				}
				else
				{
					//include("dashboard.php");
					//header("location:dashboard.php");
					 <a class="navbar-brand" href="../index.html"><font color=#E77607>Better</font><font color=#138808>India!</font></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-info fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a onClick="MyWindow=window.open('../userguide.php','MyWindow',width=300,height=150)">
                                <div>
                                    <i class="fa fa-info-circle fa-fw"></i> User guide
                                </div>
                            </a>
                        </li>
                        <li>
                            <a onClick="MyWindow=window.open('../instituteguide.php','MyWindow',width=300,height=150)">
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
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        <?php
                            }
                            else{
                        ?>
                        <li><a onClick="javascript:loadDoc('login.php')"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a href="loginpage.php"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
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
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
            }
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a onClick="javascript:loadDoc('search.php')" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> History<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onClick="javascript:loadDoc('solutions-provided.php')">Solutions Provided</a>
                                </li>
                                <li>
                                    <a onClick="javascript:loadDoc('reported-bogus.php')">Reported as bogus</a>
                                </li>
                                <li>
                                    <a onClick="javascript:loadDoc('reported-duplicate.php')">Reported as duplicate</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a onClick="javascript:loadDoc('change-password.php')"><i class="fa fa-user fa-fw"></i> Change Password</a>
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
        
        <div class="main-content" id="main">
            <div class="container-fluid" id="field">

            </div>
            <!-- /.container-fluid -->
        </div>
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->

        
    </div>
    

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

				}
			}
		}
					
	else
	{
		echo "<b>Something went wrong</b>!!!!";
		
	}
?>
</body>
</html>