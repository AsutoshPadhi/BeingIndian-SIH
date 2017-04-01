<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../functions/ajax.js"></script>
    <script src="urlGenerator.js"></script>
    <script src="tabs.js"></script>
    <script>
        $(document).load(function()
        {
            $("#addIssue").click();
            return false;
        });
    </script>

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
<body onload="document.getElementById('dash').click();">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php
                    session_start();
                    require('../functions/func_out.php');
					require('../functions/dataBaseConn.php');
                    if(isset($_SESSION['$email'])){
                        $login = true;
                        $email = $_SESSION['$email'];
                        $sql = "SELECT * from user WHERE user_email = '$email'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$fname = $row['fname'];
						$lname = $row['lname'];
                        if($fname == ""){
                            $fname  = 'Anonymous';
                        }
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
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php if($login)echo "Welcome, ".$fname;else echo "Welcome User"; ?> <i class="fa fa-caret-down"></i>
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
                        <li><a data-toggle="modal" data-target="#userLogin"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a data-toggle="modal" data-target="#instLogin"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
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
                        <li id="dash">
                            <?php
                                #results according to profile
                                $checkProfile = "SELECT * FROM user where user_email = '".$email."'";
                                $result = $conn->query($checkProfile);
                                $row = $result->fetch_assoc();
                                $district_id = $row['district_id'];
                                $_SESSION['district_id'] = $district_id;
                                if($district_id != "")
                                {
                                    $sql = "SELECT * FROM issue WHERE district_id = ".$district_id."";
                                    
                                }
                                else
                                {
                                    $sql = "SELECT * FROM issue WHERE 1";
                                }
                                $url = "../issue-display.php?sql=".$sql."";
                            ?>
                            <a id="sb" onClick='javascript:loadDoc("<?php echo $url?>","field");$("#searchBar").show();'><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                        </li>
                        <!-- onclick="javascript:openField(event, 'addIssue')"-->
                        <li id="addIssue">
                            <a onclick="javascript:loadDoc('add-issue.php','field');$('#searchBar').hide();" 
                            onload="hideSearchBar()"><i class="fa fa-plus fa-fw"></i> Add Issue</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> History<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                        $sql = historyAdded($email);
                                        $url = "../issue-display.php?sql=".$sql."";
                                    ?>
                                    <a onClick='javascript:loadDoc("<?php echo $url?>","field");$("#searchBar").hide();'>Added by you</a>
                                </li>
                                <li>
                                    <?php
                                        $sql = historyUpvoted($email);
                                        $url = "../issue-display.php?sql=".$sql."";
                                    ?>
                                    <a onClick='javascript:loadDoc("<?php echo $url?>","field");$("#searchBar").hide();'>Upvoted by you</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a onClick="javascript:loadDoc('profile.php','field');$('#searchBar').hide();"><i class="fa fa-user fa-fw"></i> Profile</a>
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
            <div class="searchBar" id="searchBar">
                <?php require('dashboard-searchBar.php'); ?>
            </div>
            <div class="container-fluid" id="field">

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php
        //session_start();
        if(isset($_SESSION['toOpen']))
        {
            if($_SESSION['toOpen'] == "search.php")
            {
                include '../functions/dataBaseConn.php';
                $sql = "SELECT * FROM issue WHERE 1";
                //$url = "../issue-display.php?sql=".$sql."";
                if($login)
                {
                    $checkProfile = "SELECT * FROM user where user_email = '".$email."'";
                    $result = $conn->query($checkProfile);
                    $row = $result->fetch_assoc();
                    $district_id = $row['district_id'];
                    //$_SESSION['district_id'] = $district_id;
                    if($district_id != "")
                    {
                        $sql = "SELECT * FROM issue WHERE district_id = ".$district_id."";
                        
                    }
                }
                $url = "../issue-display.php?sql=".$sql."";
                ?><script>loadDoc('<?php echo $url ?>','field');</script><?php
                unset($_SESSION['toOpen']);
            }

            else if($_SESSION['toOpen'] == "add-issue.php")
            {
                ?><script>loadDoc('add-issue.php','field');</script><?php
                unset($_SESSION['toOpen']);
            }
        }
        else{
            include '../functions/dataBaseConn.php';
            $sql = "SELECT * FROM issue WHERE 1";
            //$url = "../issue-display.php?sql=".$sql."";
            if($login)
            {
                $checkProfile = "SELECT * FROM user where user_email = '".$email."'";
                $result = $conn->query($checkProfile);
                $row = $result->fetch_assoc();
                $district_id = $row['district_id'];
                //$_SESSION['district_id'] = $district_id;
                if($district_id != "")
                {
                    $sql = "SELECT * FROM issue WHERE district_id = ".$district_id."";
                    
                }
            }
            $url = "../issue-display.php?sql=".$sql."";
            ?><script>loadDoc('<?php echo $url; ?>','field');</script><?php
            //session_unset($_SESSION['toOpen']);
        }

    ?>
    <script>
        var login = <?php if($login){echo "true";}else{echo "false";}?>;
        if(login){
            document.getElementById("main").style.marginLeft = "250px";
        }
        else{
            document.getElementById("main").style.marginLeft = "0px";
        }
        // if(toOpen == "add-issue.php")
        // {
        //     loadDoc('add-issue.php','field');
        // }
    </script>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×</button>
                    <h4 class="modal-title" id="myModalLabel">Institute Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="institute/login.php" method="POST" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="cemail" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="cemail" id="cemail" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button  type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                        <a onClick="loadDoc('../institute/forgot-password.php','field');$('#myModal').modal('hide');">Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×</button>
                    <h4 class="modal-title" id="myModalLabel">User Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mainBox">
                                <div class="loginText">
                                    User Login
                                </div>
                                <div style="margin: 15px 0px;" class="styleBox">
                                    <a class="btn btn-block btn-social btn-google-plus" href='../user/login.php'>
                                        <i class="fa fa-google-plus"></i> Sign in with Google
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>