<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../functions/ajax.js"></script>

    <title>Better India!</title>
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
  <style>
  .modal {
    display: none; /* Hidden by default */
    position:fixed;
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
  </style>

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php
                
                    
                        $login = false;
                       // header('Location: loginpage.php');
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
                        <li><a onclick="javascript:loadDoc('login.php')"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a  id="click"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
                        <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="login3.php" method="post">

<h1 style="text-align:center"><u>Login Form</u></h1>
  
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required maxlength=9>
        
    <input type="submit" value="LOGIN" name="loginuser" class="login">
    <br>
    <input type="checkbox" checked="checked"> Remember me
  
</form>
  <div class="container" style="background-color:#f1f1f3">
   <!--<button type="button" class="cancelbtn" onclick="f1()">Cancel</button>-->
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  </div>
</div>
<script>

var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("click");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick =function () {
    modal.style.display = "block";
    alert("hello");
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
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
                            <a onClick="javascript:loadDoc('search.php')"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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

</body>

</html>
