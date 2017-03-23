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
    <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
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
                            <a href="loginpage.php">
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
                        <li><a onClick="javascript:loadDoc('user/login.php')"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a onClick="javascript:loadDoc('institute/loginpage.php')"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
                        <?php
                            }
                        ?>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        
        <!-- Page Content -->
        
            <div class="container-fluid" id="field">
                <div class="container">
                <div class="tagline panel-body"><h1>Ask questions for a better tomorrow</h1></div>
                <div class="aboutUs lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis ornare risus. Quisque sit amet pharetra quam. Curabitur fermentum justo eu est sagittis tincidunt. Cras eu massa nunc. Integer imperdiet molestie tempus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis arcu lorem, bibendum eget commodo quis, fringilla non nibh. </div>
                <div class="buttons">
                    <button type="button" onclick="location.href='user/dashboard.php';" class="btn btn-outline btn-primary btn-lg" id="search">Search an Issue</button>
                    <button type="button" onclick="location.href='user/<?php if($login)echo 'dashboard.php'; else echo "user/login.php";?>';" class="btn btn-outline btn-primary btn-lg" id="add">Add an Issue</button>
                </div>
            </div>
            </div>
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->
        <video autoplay loop width="100%" height="auto">
            <source src="https://indiastack.org/wp-content/themes/indiastack/video/videobg.webm" type="video/webm">
        </video>

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
