<!DOCTYPE html>
<html>
    <head>
<?php
session_start();
if(isset($_SESSION['$cemail'])){
    if(isset($_POST['old'])){
        $cemail = $_SESSION['$cemail'];
        //echo $cemail;
        $old = $_POST['old'];
        //echo $old;
        $old = md5($old);
        $new = $_POST['new'];
        $new = md5($new);

        $conn=mysqli_connect("localhost","root","","hackathon");
        $sql =  "SELECT * from institute WHERE inst_password = '".$old."' AND inst_email = '".$cemail."'";
        $result =$conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row['inst_password'];
        if ($result->num_rows > 0) {
            $sql = "UPDATE institute set inst_password = '".$new."' WHERE inst_password = '".$old."' AND inst_email = '".$cemail."'";
            $result =$conn->query($sql);
            $_SESSION['$cemail']=$cemail;
            header('Location: dashboard.php');
            $_SESSION['$message'] = 'success';
        }
        else{
            $_SESSION['$cemail']=$cemail;
            //header('Location: dashboard.php');
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
#code for forgot password
else
{
    $cemail = $_GET["em"];
    echo "email = ".$cemail."\n";
    #generate a password
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++)
    {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $otp = implode($pass);
    
    echo "otp = ".$otp."\n";
    
    #send the mail

    require 'sendMail.php';
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        A mail containing the OTP has been sent to you.
    </div>

    <?php
    #set otp as password temporarily
    include '../functions/dataBaseConn.php';
    $otp = md5($otp);
    $sql = "UPDATE institute set inst_password = '".$otp."' WHERE inst_email = '".$cemail."'";
    $result =$conn->query($sql);
    //header('Location : index.php');

    ?>
    <!--<form method="POST" action="index.php" class="form-vertical" id="changePassword" style="border: 1px solid #ddd; padding: 20px;">
        <div class="form-group">
            <label>Given Password</label>
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
    </form>-->
    <div>Login again with the OTP and then change the password</div>

    <?php
    //session_start();
    /*if(isset($_SESSION['cemail']))
        echo $_SESSION['cemail'];
    echo "\nemail = ".$cemail."\n";
    //$_SESSION['cemail'] = $cemail;*/
}
?>
</html>