<?php

	$cemail = $_POST["email"];
    echo "email = ".$cemail."\n";
    
    #generate a password
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++)
    {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $otp = implode($pass);
    echo "otp = ".$otp."\n";
    
    #send the mail
    require 'mailTest.php';
    

    #set otp as password temporarily
    include '../functions/dataBaseConn.php';
    $otp = md5($otp);
    $sql = "UPDATE institute set inst_password = '".$otp."' WHERE inst_email = '".$cemail."'";
    $result =$conn->query($sql);

	session_start();
    $_SESSION['$cemail'] = $cemail;
    header('Location: change-password.php');

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
