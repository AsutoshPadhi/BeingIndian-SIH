<!DOCTYPE html>
<html>
    <head>
<?php
session_start();
if(isset($_SESSION['$cemail'])){
    if(isset($_POST['old'])){
        $old = $_POST['old'];
        $old = md5($old);
        $new = $_POST['new'];
        $new = md5($new);

        $conn=mysqli_connect("localhost","root","","hackathon");
        $sql =  "SELECT * from institute WHERE inst_password = '$old' and $cemail = '$cemail'";
        $result =$conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE institute set inst_password = '$new' WHERE inst_password = '$old'";
            header('Location: dashboard.php');
        }
        else{
            header('Location: dashboard.php');
        }

    }
    else{
?>
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
                <script src="../vendor/jquery/jquery.min.js"></script>
                <!-- Bootstrap Core JavaScript -->
                <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
                <!-- Metis Menu Plugin JavaScript -->
                <script src="../vendor/metisMenu/metisMenu.min.js"></script>
                <!-- Custom Theme JavaScript -->
                <script src="../dist/js/sb-admin-2.js"></script>
            </head>
            <form method="POST" action="change-password.php" class="form-vertical" id="changePassword" style="border: 1px solid #ddd; padding: 20px;">
                <div class="form-group">
                    <label>Old Password</label>
                    <input id="old" type="password" name="old" class="form-control" placeholder="Enter the old password">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input id="new" type="password" name="new" class="form-control" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input id="new2" type="password" class="form-control" placeholder="Confirm new password">
                </div>
                <input type="submit" class="btn btn-primary" value="Change Password">
            </form>
<?php
    }
}
else{
    header('index.php');
}
?>
</html>