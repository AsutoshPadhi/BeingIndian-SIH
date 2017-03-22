<?php
//session_start(); 
if (isset($_POST['loginuser'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$dbname="mainpage";
$conn = new mysqli("localhost", "root", "",$dbname);
$sql = "select * from login where password='$password' AND username='$username'";
$result =$conn->query($sql);
if ($result->num_rows>0) {
	//echo "Correct data";
	session_start();
	$_SESSION['login_user']=$username; // Initializing Session
 // Redirecting To Other Page
 //$_SESSION['login_user']=session_id();
	header("location: securepage.php"); // Redirecting To Other Page

} else {
$error = "Username or Password is invalid";
}
$conn->close(); // Closing Connection
}
}
?>
 