
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="//..style/styleLogin.css" >
</head>
<body>


  <div class="fullpage" id="i1">
  <form action="login3.php" method="post">

<h1 style="text-align:center"><u>Login Form</u></h1>
  <div class="container">
    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required maxlength=9>
        
    <input type="submit" value="LOGIN" name="loginuser" class="login">
	<br>
    <input type="checkbox" checked="checked"> Remember me
  </div>
</form>
  <div class="container" style="background-color:#f1f1f3">
    <button type="button" class="cancelbtn" onclick="f1()">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  </div>

<script>
var x=document.getElementById('i1');
//function declaration
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
</script>
</body>
</html>
