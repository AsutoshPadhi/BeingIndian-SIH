<?php
/*if(isset($SESSION['login_user'])){
	header("location:securepage.php");
}*/
?>

<!DOCTYPE html>
<html>
<body>
<!--<div>
<button>REGISTRATION</button>
<br>
<br>
<button onclick="f1()">LOGIN</button>
</div>
-->
  <div class="fullpage" id="i1">
  <form action="login3.php" method="post">

<h1 style="text-align:center"><u>Login Form</u></h1>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required maxlength=9>
        
    <input type="submit" value="login" name="loginuser">
	<br>
    <input type="checkbox" checked="checked"> Remember me
  </div>
</form>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  </div>

<script>
var x=document.getElementById('i1');
function f1()
{
document.getElementById('i1').style.display="block";
}
window.onclick=function(event)
{
if(event.target==x){
x.style.display="none";
}
}
</body>
</html>
