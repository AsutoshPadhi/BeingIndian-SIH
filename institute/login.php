<?php
if (isset($_POST['cemail'])) 
{
    if (empty($_POST['cemail']) || empty($_POST['password'])) 
    {
        $error = "Username or Password is invalid";
        echo $error;
    }
    else
    {
        //include("D:/testProject/functions/dataBaseConn.php");
        $conn=mysqli_connect("localhost","root","","hackathon");

        $cemail=$_POST['cemail'];
        $pass=$_POST['password'];
        $pass=md5($pass);
        $sql = "select * from institute where inst_password='$pass' AND inst_email='$cemail'";
        $result =$conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['$cemail']=$cemail; // Initializing Session
            // Redirecting To Other Page
            //$_SESSION['login_user']=session_id();
            header("location: change-password.php"); // Redirecting To Other Page
        } 
        else 
        {
            $error = "Username or Password is invalid";
            echo $error;
        }
        $conn->close(); // Closing Connection
    }
}

?>
