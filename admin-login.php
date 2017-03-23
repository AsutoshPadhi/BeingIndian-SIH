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
    </head>

    <body>
        <?php require('functions/dataBaseConn.php'); ?>
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