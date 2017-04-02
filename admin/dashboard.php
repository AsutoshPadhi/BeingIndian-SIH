<?php
    session_start();
	// require_once("globalVariables.php");
    if(isset($_SESSION['$username'])){
        $login = true;
    }
    else{
        $login = false;
        header("Location: ../index.php");
    }
    require('../functions/func_out.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../functions/ajax.js"></script>
    <script src="../user/urlGenerator.js"></script>

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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><font color=#E77607>Better</font><font color=#138808>India!</font></a>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo "Welcome, ".$_SESSION['$username']. " "; ?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        </li>
                        <li><a href="../user/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a onClick='javascript:loadDoc("unsolved_issues.php","field");$("#searchBar").show();'><i class="fa fa-question fa-fw"></i> Pending Issues</a>
                        </li>
                        <li>
                            <a onClick="javascript:loadDoc('trending_issues.php','field');$('#searchBar').hide();"><i class="fa fa-angle-double-up fa-fw"></i> Trending Issues</a>
                        </li>
                        <li>
                            <a onClick="javascript:loadDoc('collaborative.php','field');$('#searchBar').hide();"><i class="fa fa-gear fa-fw"></i> Collaborative Work</a>
                        </li>
                        <li>
                            <a onClick="javascript:loadDoc('top_experts.php','field');$('#searchBar').hide();"><i class="fa fa-user fa-fw"></i> Top Performing Experts</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
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


</body>
</html>