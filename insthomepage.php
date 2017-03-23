<!doctype html>
<html>
<head>
<title>HOME page</title>
<style>
body{
	
margin:0px;
border:0px;
background-color:white;
//background-image:url(https://indiastack.org/wp-content/themes/indiastack/video/videobg.jpg);

opacity:5px;

}
header{
border:1px solid;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: ;
	
}

.nav li {
    float: right;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	padding:10px;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: orange;
}
.sidenav
{
border:1px solid;
width:20%;
height:1000px;

}
li
{
//float:right;
}
.body
{
height:1000px;
display:flex;
}
input[type=text] 
{
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
  //  transition: width 0.4s ease-in-out;
}
#content
{
	width:100%;
	 padding: 15px;
	
	 
}



</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="..jquery-3.2.0.min.js"></script>
	 <script>
      $(document).ready(function(){
        // Set trigger and container variables
        var trigger = $('.sidenav ul li a'),
            container = $('#content');
        
        // Fire on click
        trigger.on('click', function(){
          // Set $this for re-use. Set target from data attribute
          var $this = $(this),
            target = $this.data('target');       
          
          // Load target page into container
          container.load(target + '.php');
          
          // Stop normal link behavior
          return false;
        });
      });
    </script>
	<!--<script>
	function showHint(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","getuser.php?State="+str,true);
        xmlhttp.send();
    }-->

</script>

   
</head>
<body>

<header>
<div class="full">
<div class="logo">
<h1>ABC</h1>
</div>
<form  class="search" style=" text-align:center" onchange="showHint(this.value)"  action="getuser.php" method="post">
<input type="text" placeholder="SEARCH" style="width: 500px; height: 15px"  id="search">
<input type="submit" value="Search" >

<br>

<!--<p>
<label>State</label>
<input type="text" name='State' >
<label>District</label>
<input type="text" name='District' >
<label>Region</label><span>(option)</span>
<input type="text" name='Region' >
<label>Pincode</label><span>(option)</span>
<input type="text" name='pin' >
</p>-->
</form >
<nav class="middlebar" >
<!--<ul>
<li><a href="">HOW TO</a></li>
<li><a href="">SIGNOUT</a></li>
</ul>-->
 <ul class="nav">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> HOW TO</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>
    </ul>
</nav>


<header>
<div class="body">
<!--<div>
<img src="https://indiastack.org/wp-content/themes/indiastack/video/videobg.jpg">
</div>-->
<div class="sidenav">
<!--<ul>
<li><a onclick="return false"  onmousedown="javascript:swapContent(www.google.com)" id="add">ADD</a></li>
<li><a onclick="return false"  onmousedown="javascript:swapContent(www.google.com)" href="">HISTORY</a></li>
<li><a  onclick="return false"  onmousedown="javascript:swapContent(www.google.com)"href="">PROFILE</a></li>
</ul>-->
<nav>
<ul>
<li><a href="add.php" data-target="add">RECENT</a></li>
<li><a  href="">HISTORY</a></li>
<li><a  href="">CHANGE PASSWORD</a></li>
</ul>
</nav>
</div>

 <div id="content">
  <?php
   include('instituteaccordian.php');
   ?>
	 <span id="txtHint"></span>
	 
    
	
</div>

</div>
<nav>
<ul class="nav">
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Signout</a></li>
      <li><a href="loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
</ul>
</nav>
</div>
</body>

</html>