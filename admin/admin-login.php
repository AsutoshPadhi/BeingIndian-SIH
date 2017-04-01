<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Social Buttons CSS -->
        <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="style/styleAdmin-login.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

    <body>
        <?php require('../functions/dataBaseConn.php'); ?>
        <?php
            if(isset($_POST['username'])&& isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = md5($password);

                $sql = "SELECT username, password from admin where username = '$username' and password = '$password'";
                $result = $conn->query($sql);

                if($result->num_rows == 1){
                    session_start();
                    $_SESSION['$username'] = $username;
                    header("Location: admin-dashboard.php");
                }
            }
            else{
            
        ?>
        <div class="box">
            <form method="POST" action="admin-login.php">
                <div class="col-md-4 form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i>
                    </span>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>
                <div class="col-md-4 form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-hashtag"></i>
                    </span>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <input class="col-md-4 search btn btn-primary" type="submit" value="Login">
            </form>
        </div>
        <?php
            }
        ?>
    </body>
</html>