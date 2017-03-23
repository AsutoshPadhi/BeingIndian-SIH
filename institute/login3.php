<?php
//session_start(); 
if (isset($_POST['loginuser'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
$login=false;
}
else
{
include("dataBaseConn.php");
$username=$_POST['username'];
$pass=$_POST['password'];
$var=md5($pass);
$sql = "select * from institute where inst_password='$var' AND inst_email='$username'";
$result =$conn->query($sql);
$login=true;
if ($result->num_rows>0) {
	session_start();
	$_SESSION['login_user']=$username; // Initializing Session
 // Redirecting To Other Page
 //$_SESSION['login_user']=session_id();

	header("location: securepage.php"); // Redirecting To Other Page

} else {
$error = "Username or Password is invalid";
echo "<h1>Username and password are not matching.....please check</h1>";
}
$conn->close(); // Closing Connection
}
}
?>
 